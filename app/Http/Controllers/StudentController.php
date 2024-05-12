<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateStudentRequest;

class StudentController extends Controller
{
    
    private StudentService $studentService;


    public function __construct()
    {
        $this->studentService = new StudentService;
    }

    public function index()
    {   
        // $students = $this->studentService->getAllStudents();
        return view('workspace.admin.matricula',compact($students));
    }

    public function store(CreateStudentRequest $request)
    {   
        try 
        {
            DB::beginTransaction();
            
            $studentCreated = $this->studentService->create($request);

            DB::commit();

            return response()->json(['message' => 'Estudiante inscrito exitosamente', 'new_student' => $studentCreated]);


        }
        catch (Exception $e)
        {
            DB::rollback();
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
