<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Inscriptions\InscriptionLapse;
use App\Models\Inscriptions\Lapse;
use App\Models\Inscriptions\SchoolLapse;
use DB;
use Illuminate\Http\Request;

class SchoolLapseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sc = SchoolLapse::select('id')->where('status',1)->orderBy('id','desc')->first();
        
        if(isset($sc))
         {
             $laps = Lapse::select('start','end','number')->where('school_lapse_id',$sc->id)->get();
             return view("workspace.admin.school_lapse",compact("laps"));
         }  

    
        return view("workspace.admin.school_lapse");
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function save_lapses(Request $request)
    {   
        if($request->ajax()){

            $school_lapse = SchoolLapse::select('id','status')->orderByDesc('id')->first();

            if(!isset($school_lapse->status) || $school_lapse->status != 1)
            {
                $sc = SchoolLapse::create(array("start" => $request->start_1, "end" => $request->end_3, "status"=> 1));
                
                   $fields = [

                        ['start' => $request->start_1, 'end' => $request->end_1, 'number' => 1, "school_lapse_id" => $sc->id ],
                        ['start' => $request->start_2, 'end' => $request->end_2, 'number' => 2, "school_lapse_id" => $sc->id ],
                        ['start' => $request->start_3, 'end' => $request->end_3, 'number' => 3, "school_lapse_id" => $sc->id ]
                    ];   

            DB::table('lapses')->insert($fields);

            InscriptionLapse::create(array("school_lapse_id"=>$sc->id));       

             return response()->json("Periodo escolar creado con exito");

            }
            else{

                $ldate = date('Y-m-d H:i:s');

                for($i = 1; $i < 4; $i++)
                {
                    $start = "start_".$i;
                    $end = "end_".$i;

                    Lapse::where('id',$school_lapse->id)->where('number',$i)->update(['start' => $request->$start, 'end' => $request->end_1, 'number' => $i, "school_lapse_id" => $school_lapse->id ]);

                }

                SchoolLapse::where('id',$school_lapse->id)->update(["start" => $request->start_1, "end" => $request->end_3, "status"=> 1]);



                return response()->json("Periodo escolar actualizado con exito.");
            }

         
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
