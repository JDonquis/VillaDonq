<?php

namespace App\Http\Controllers\Inscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\InscriptionRequest;
use App\Models\Documents\Type_Document;
use App\Models\Request\Request_s;
use App\Models\Inscriptions\InscriptionLapse;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

       $lapse_id = Quota::last_lapse_id();

       $q_available = Quota::where('remaining','>',0)
                    ->where('inscription_lapse_id',$lapse_id)
                    ->get();

        $lapse = new InscriptionLapse;         

        $docs = Type_Document::where('status',1)->get();

            if($lapse->verify_date())
                return view("inscriptions.index",compact('q_available','docs'));
            else 
                return view("inscriptions.inscriptions_closed",['message' => 'Lo sentimos las inscripciones han sido cerradas']);


    }

    public function requests()
    {   
        $docs = Type_Document::where('status',1)->get();

        return view('workspace.admin.request',compact('docs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function requests_show(Request $request)
    {     
         if($request->ajax())
         {  

            $requests_s = new Request_s;
            // $r = $requests_s->find(16)->type_documents(); 
            $r = Request_s::where('request_statu_id',3)->get()->toArray();
            // $r = $requests_s->find(6)->type_documents;

            return response()->json($r);

  
         }
         
    }


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

                 $r->request_statu_id = '1';
                 $r->save();

            });
            
            return response()->json(['message'=>'Solicitud aceptada con exito']);
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_request(InscriptionRequest $request)
    {
        

        $request_student = new Request_s;


        $request->request->add(['request_statu_id' => 3]);
           
        $request_student->create($request->all());

        $id_request = $request_student->latest('id')->first()->id;



        
         // First Step, Call all type_documents enabled
        $t = Type_Document::where('status',1)->get()->toArray();

        // Second Step

        foreach ($t as $key => $doc_up) {
                
            $dUp = $doc_up['name'].'_up';
            $d = $doc_up['name'];      
            if($doc = Request_s::set_docs($request->$dUp,false,$d))  
            {
                
                DB::table('request_documents')->insert([

                     'request_s_id' => $id_request,
                    'type_document_id' => $doc_up['id'],
                    'name' => $doc
                ]);
            }     
                

            }   




            return redirect('/inscribirse')->with('message','Solicitud enviada correctamente, la respuesta será enviada al correo');


    }

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

    public function update(Request $request, $id)
    {
        if($request->ajax())
        {   

            Request_s::where('id',$id)->update(['request_statu_id' => 2]);

            $r = Request_s::where('id',$id)->first();

            Mail::to($r->email)->queue(new Message_request($r));
            
            return response()->json(['message'=>'Solicitud rechazada con exito']);
        }
    }

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


    
    public function consult(Request $request)
    {
        if($request->ajax()){

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

    public function see_documents(Request $request,$id)
    {   
        if($request->ajax())
        {   
            $docs = Type_Document::where('status',1)->get();
            $request_docs = Request_s::with('type_documents')->where('id',$id)->first();
            return view('workspace.admin.see_documents',compact("request_docs","docs"));
        }
        
    }


   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id,Request $request)
    {
        
    }
}



/*





*/