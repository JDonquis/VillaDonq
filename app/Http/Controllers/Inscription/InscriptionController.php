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


use DB;

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

            if($lapse->verify_date())
                return view("inscriptions.index",compact('q_available'));
            else 
                return view("inscriptions.inscriptions_closed",['message' => 'Lo sentimos las inscripciones han sido cerradas']);


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
            $requests_s = Request_s::where('request_statu_id',3)->orderBy('request_statu_id','asc')->get()->toArray();

     
            return json_encode($requests_s);
  
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
                    'course_section_id' => $cs->id ,
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
        
        // First Step, Call all type_documents enabled
        $t = Type_Document::where('status',1)->get()->toArray();

        // Second Step

        foreach ($t as $key => $doc_up) {
                
            $dUp = $doc_up['name'].'_up';
            $d = $doc_up['name'];      
            if($doc = Request_s::set_docs($request->$dUp,false,$d))                
                $request->request->add([$d => $doc]);

        }   


            $request->request->add(['request_statu_id' => 3]);
           
            Request_s::create($request->all());

            return redirect('/inscribirse')->with('message','Solicitud enviada correctamente, la respuesta será enviada al correo');


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

    public function requests()
    {
        return view('workspace.admin.request');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
