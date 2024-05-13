<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\CourseSection;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Resources\CourseSectionCollection;

class StudentController extends Controller
{
    
    private StudentService $studentService;


    public function __construct()
    {
        $this->studentService = new StudentService;
    }

    public function index()
    {   
        $courses = Course::all();
        $course_sections = new CourseSectionCollection(CourseSection::with('section','course')->get());
        $studentsPerCourse = $this->studentService->getStudentsPerCourse(1);
        return view('workspace.admin.matricula',['students' => $studentsPerCourse, 'courses' => $courses, 'course_sections' => $course_sections]);

    }

    public function store(CreateStudentRequest $request)
    {   
        DB::beginTransaction();

        try 
        {
   
            $studentCreated = $this->studentService->create($request);
            DB::commit();
            return response()->json(['message' => 'Estudiante inscrito exitosamente', 'new_student' => $studentCreated]);


        }
        catch (Exception $e)
        {   
            
            DB::rollback();
             
            return response()->json(['message' => $e->getMessage()],400);
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
