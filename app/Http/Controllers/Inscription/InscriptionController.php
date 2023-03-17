<?php

namespace App\Http\Controllers\Inscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\InscriptionRequest;
use App\Models\Documents\Type_Document;
use App\Models\Request\Request_s;
use App\Models\Inscriptions\InscriptionLapse;
use App\Models\Inscriptions\SchoolLapse;
use App\Models\Inscriptions\Course;
use App\Models\Inscriptions\Quota;
use App\Models\Inscriptions\CourseSection;
use App\Models\Person\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Message_request;

use DB;
use Validator;

class InscriptionController extends Controller
{

    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // ------------------------------------------------------ Inscription Index --------------------

    public function index()
    {   

        $school_lapse = SchoolLapse::with('inscription_lapse')->latest()->first();

        if(!isset($school_lapse->status) || $school_lapse->status != 1)
             return view("inscriptions.inscriptions_closed",['message' => 'Lo sentimos las inscripciones no estan disponibles']);

         if( !isset($school_lapse->inscription_lapse) )
            return view("inscriptions.inscriptions_closed",['message' => 'Lo sentimos las inscripciones no estan disponibles']);

       $lapse_id = Quota::last_lapse_id();

       $q_available = Quota::where('remaining','>',0)
                    ->where('inscription_lapse_id',$lapse_id)
                    ->get();

        $lapse = new InscriptionLapse;         

        $docs = Type_Document::where('status','1')->get();

            if($lapse->verify_date())
                return view("inscriptions.index",compact('q_available','docs'));
            else 
                return view("inscriptions.inscriptions_closed",['message' => 'Lo sentimos las inscripciones han sido cerradas']);


    }

    // ------------------------------------------------------ Save Requests from inscription index

    public function save_request(InscriptionRequest $request)
    {
        

        $request_student = new Request_s;


        $request->request->add(['request_statu_id' => 3]);
           
        $request_student->create($request->all());

        $id_request = $request_student->latest('id')->first()->id;

        
        // First Step, Call all type_documents enabled
       
        $t = Type_Document::where('status',1)->get()->toArray();

        // Second Step validate docs_up
            
        foreach ($t as $key => $doc_up) {
                
            $dUp = $doc_up['name'].'_up';
            $d = $doc_up['name'];

            if($doc_up['required'] == 1)
            {
                if(!isset($request->$dUp)){

                    DB::table('request_documents')->where('request_id',$id_request)->delete();
                    Request_s::where('id',$id_request)->delete();

                    return back()->with( ['message' => str_replace('_', ' ',$d ).' es requerido.','continue' => 'OK'] )->withInput();     
                }
                else{

                     if(!$doc = Request_s::verify_type_doc($request->$dUp) )
                     {
                        
                        DB::table('request_documents')->where('request_id',$id_request)->delete();
                        Request_s::where('id',$id_request)->delete();

                        return back()->with( ['message' => 'Formato de '. str_replace('_', ' ',$d ).' no valido, Asegurese que el fomato sea pdf, jpg, jpeg, png','continue' => 'OK'] )->withInput();

                     }
                     else{

                         $doc = Request_s::set_docs($request->$dUp,false,$d);
                         DB::table('request_documents')->insert([

                             'request_id' => $id_request,
                            'type_document_id' => $doc_up['id'],
                            'name' => $doc
                         ]);
                     }   
                }
            }
            else{

                if(isset($request->$dUp)){
                   if(!$doc = Request_s::verify_type_doc($request->$dUp) ){ 
                        
                        DB::table('request_documents')->where('request_id',$id_request)->delete();
                        Request_s::where('id',$id_request)->delete();

                        return back()->with( ['message' => 'Formato de '. str_replace('_', ' ',$d ).' no valido, Asegurese que el fomato sea pdf, jpg, jpeg, png','continue' => 'OK'] )->withInput();
                        }
                    else{

                        $doc = Request_s::set_docs($request->$dUp,false,$d);
                        DB::table('request_documents')->insert([

                             'request_id' => $id_request,
                            'type_document_id' => $doc_up['id'],
                            'name' => $doc
                        ]);

                    }
     
                }

            }   

        }


        return redirect('/inscribirse')->with('message','Solicitud enviada correctamente, la respuesta será enviada al correo');


    }

    // ------------------------------------------------------ Verify Requests from inscription index

    public function verify_request(Request $request)
    {

         if($s = Request_s::where('DNI',$request->DNI)->orWhere('email',$request->email)->first() );
         {  
            $m = '';
            if($s->request_statu_id == 1)
                $m = 'Su solicitud anteriormente fue aceptada, Por favor revise su email';
            elseif ($s->request_statu_id == 2)
            {
                $m = 'Su solicitud anteriormente fue rechazada, Por favor espere al siguiente periodo de inscripcion';
            }
            elseif($s->request_statu_id == 3)
                $m = 'Su solicitud aun no ha sido revisada, Por favor espere la respuesta en su email';

             return redirect('/inscribirse')->with('message',$m);
         }
    }

    // ------------------------------------------------------ Consult Request statu from inscription index
    
    public function consult(Request $request)
    {
        if($request->ajax()){

            if(!isset($request->DNI))
                return response()->json(["continue" => "NO","message" => "Ingrese un DNI valido"]);
            

            $r = Request_s::where("DNI",$request->DNI)->first();

            if(empty($r))
                return response()->json(["continue" => "OK","DNI" => $request->DNI, "year" => $request->year]);
            else{

                if ($r->request_statu_id == 1)
                {
                 return response()->json(["continue" => "NO","message" => "Su solicitud fue aceptada anteriormente, revise su correo para mas informacion"]);   
                }
                else if($r->request_statu_id == 2){

                    return response()->json(["continue" => "NO","message" => "Su solicitud fue rechazada anteriormente, revise su correo para mas informacion"]);
                }
                else if($r->request_statu_id == 3)
                {
                    return response()->json(["continue" => "NO","message" => "Su solicitud anterior aun no ha sido revisada, por favor espere la respuesta via email, o intente mas tarde"]);                    
                }
            }    

            
        }
    }




    // ------------------------------------------------------ Requests Index --------------------

    public function requests()
    {   
        $docs = Type_Document::where('status',1)->get();

        return view('workspace.admin.request',compact('docs'));
    }

    // ------------------------------------------------------ Show Requests from request index

    public function requests_show(Request $request)
    {     
         if($request->ajax())
         {  

            $requests_s = new Request_s;
            $r = Request_s::where('request_statu_id',3)->get()->toArray();
            return response()->json($r);

  
         }
         
    }

    // ------------------------------------------------------ Create New Student from request index

    public function create(Request $request)
    {
        if($request->ajax())
        {  
            
            DB::transaction(function () use ($request) {
                
                $r = Request_s::findOrFail($request->request_id);

                // Create user
                User::create([

                    'type_user_id'=>2,
                    'DNI' => $r->DNI,
                    'name' => $r->name,
                    'last_name'=>$r->last_name,
                    'email' => $r->email,
                    'password' => Hash::make($r->DNI),
                    'phone_number' => $r->phone_number,
                    'address' => $r->address,
                    'date_birth'=>$r->date_birth,
                    'state' => $r->state,
                    'city' => $r->city,
                    'photo' => ''
                ]);

                // Create Student

                $u = User::select('id')->orderBy('id', 'desc')->first();

                $cs = CourseSection::where('course_id',$r->year)->where('section_id',1)->first();

                Student::create([

                    'user_id' => $u->id,
                    'course_section_id' => $cs->id,
                    'rep_name' => $r->rep_name,
                    'rep_DNI' => $r->rep_DNI,
                    'rep_phone_number' => $r->rep_phone_number, 

                ]);

                $s = Student::select('id')->orderBy('id', 'desc')->first();

                $documents = Type_Document::select('id','name')->where('status',1)->orderBy('id','asc')->get()->toArray();

                $fields = array();

                foreach($documents as $document)
                {   $name = $document['name'];
                    $field = array( 'student_id' => $s->id, 'type_document_id' => $document['id'], 'document' =>$r->$name  );
                    array_push($fields,$field);
                }


                 DB::table('document_students')->insert($fields);

                 $lapse = InscriptionLapse::select('id')->orderBy('id', 'desc')->first();

                 DB::table('inscriptions')->insert([

                    'inscription_lapse_id' => $lapse->id,
                    'student_id' => $s->id

                 ]);

                 Quota::where("inscription_lapse_id",$lapse->id)->where("course_id",$r->year)->increment("accepted");
                 Quota::where("inscription_lapse_id",$lapse->id)->where("course_id",$r->year)->decrement("remaining");

                 $r->request_statu_id = '1';
                 $r->save();



            });
            
            return response()->json(['message'=>'Solicitud aceptada con exito']);
            
        }
    }



    // ------------------------------------------------------ Reject Requests from request index

    public function update(Request $request, $id)
    {
        if($request->ajax())
        {   

            Request_s::where('id',$id)->update(['request_statu_id' => 2]);

            $r = Request_s::where('id',$id)->first();
              
            //Mail::to($r->email)->queue(new Message_request($r));
            
            return response()->json(['message'=>'Solicitud rechazada con exito']);
        }
    }

    // ------------------------------------------------------ Filter Requests from request index

    public function filter_requests(Request $request,$action)
    {
        if($request->ajax())
        {   
            $year = [];
           if($request->year == "all")
                $year = [1,2,3,4,5];
            else
                $year = [$request->year];

           if($action == 2)
                $requests_s = Request_s::where('request_statu_id',2)->whereIn('year',$year)->orderBy('request_statu_id','asc')->get()->toArray();
            else if($action == 1)
                $requests_s = Request_s::where('request_statu_id',1)->whereIn('year',$year)->orderBy('request_statu_id','asc')->get()->toArray();
            else if($action == 3)
                $requests_s = Request_s::where('request_statu_id',3)->whereIn('year',$year)->orderBy('request_statu_id','asc')->get()->toArray();


            return response()->json($requests_s);
    
            
        }
    }


    // ------------------------------------------------------ Consult Request documents from request index

    public function see_documents(Request $request,$id)
    {   
        if($request->ajax())
        {   
            $docs = Type_Document::where('status',1)->get();
            $request_docs = Request_s::with('type_documents')->where('id',$id)->first();
            return view('workspace.admin.see_documents',compact("request_docs","docs"));
        }
        
    }


    // ------------------------------------------------------ Config Inscriptions Index --------------------

    public function config()
    {   

        //Verify if exists school lapse 
        $school_lapse = SchoolLapse::with('inscription_lapse.quotas')->orderBy('id','desc')->first();

        $access = false;

        if($school_lapse == null)            
            return view('workspace.admin.inscriptions.config',compact('access'));

        else{

             

            if ($school_lapse->status == 1)
            {       
                $docs = Type_Document::orderBy('id','asc')->get();   
                $access = true;

                if(isset($school_lapse->inscription_lapse->id))
                {   
                      

                       $docs = Type_Document::orderBy('id','asc')->get();

                       return view('workspace.admin.inscriptions.config',compact('access','school_lapse','docs')); 
                }
                else
                {
                       

                       return view('workspace.admin.inscriptions.config',compact('access','docs'));
                }   
            }

            else{ return view('workspace.admin.inscriptions.config',compact('access') ); }
        }
        
    }

    public function save_config(Request $request)
    {
        if($request->ajax())
        {   

            $id_lapse = InscriptionLapse::select('id')->orderBy('id','desc')->first();

            //Verify field
            if($request->field == 'date')
            {
                

                if($request->start != null)
                    $ins_lapse = InscriptionLapse::where("id",$id_lapse->id)->update(["start" => $request->start, "end" => $request->end]);
                else{

                    $ins_lapse = InscriptionLapse::where("id",$id_lapse->id)->update(["end" => $request->end]);
                }

                return response()->json("Fecha actualizada con exito!.");
            }

            if($request->field == 'quota')
            {   

                $assigned = 'assigned';
                $remaining = 'remaining';

                for($i = 1; $i <= 5; $i++)
                {
                    $a = $assigned.$i;
                    $r = $remaining.$i;
                    $accepted = $request->$a - $request->$r;
                   Quota::updateOrCreate(
                    ['inscription_lapse_id' =>  $id_lapse->id, 'course_id' => $i ],
                    ['assigned' => $request->$a, 'remaining' => $request->$r, 'accepted' =>$accepted]
                );
                    
                }
                
                return response()->json("Cupos actualizados con exito!.");

                // return response()->json($id_lapse);
            }

            if($request->field == 'doc')
            {   

                for($i = 1; $i <= number_format($request->unidades);$i++)
                {
                    
                     $str = "doc-id-".$i;
                     $str2 = "tema".$i;
                     $rq = "requested".$i."-1";
                     $rqr = "required".$i."-2";

                     $st = 0;
                     $re = 0;
                     $id_doc = $request->$str;
                     $n = $request->$str2;
                     
                     if(isset($request->$rq))
                        $st = 1;
                    
                     if(isset($request->$rqr))
                        $re = 1;


                        Type_Document::updateOrCreate(

                            ['id' => $id_doc],
                            ['name' => str_replace(" ","_",$n),'status' => $st, 'required' => $re]                   
                            
                        );
                }    
                      return response()->json("Documentos actualizados con exito!.");
                
            }
            
        }
    }

}



/*





*/