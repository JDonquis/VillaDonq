<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\MainConfig;
use App\Models\SchoolLapse;
use App\Models\TypeDocument;
use App\Models\CourseSection;
use App\Models\Representative;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\StudentResource;
use App\Http\Resources\StudentCollection;

class StudentService
{      

    private $months = [
        'august' => 0,
        'september' => 0,
        'october' => 0,
        'november' => 0,
        'december' => 0,
        'january' => 0,
        'february' => 0,
        'march' => 0,
        'april' => 0,
        'may' => 0,
        'june' => 0,
        'july' => 0,
    ];

    public function create($request)
    {   
        $data = $request->all();

        
        $user = User::where('DNI',$data['rep_DNI'])->first();        
        if(!isset($user->id))
            $user = $this->createUser($data);
            
        
        $representative = Representative::where('user_id',$user->id)->first();

        if(!isset($representative->id))
            $representative = $this->createRepresentative($data,$user->id);


        $student = $this->createStudent($data,$representative->id);

        $student->load('representative.user','course_section.course','course_section.section');
        
        
        // $this->createDocuments($request,$student->id);

        $this->createBalance($student->id);

        return new StudentResource($student);

        
    }

    public function getStudentsPerCourse($courseId)
    {
        $courseSectionsIds = null;

        if($courseId != 1)
            $courseSectionsIds = CourseSection::where('course_id',$courseId)->get()->pluck('id')->toArray();
        else
            $courseSectionsIds = CourseSection::pluck('id')->toArray();

        $students = Student::whereIn('course_section_id',$courseSectionsIds)->with('representative.user','course_section.course','course_section.section')->get();
        $studentsCollection = new StudentCollection($students);

        $studentPerCourseAndSection = [];

        foreach ($studentsCollection as $student)
        {
            $sectionId = $student->course_section->section_id;
            
            if (!isset($studentPerCourseAndSection[$sectionId])) 
                $studentPerCourseAndSection[$sectionId] = [];
            
                
            $studentPerCourseAndSection[$sectionId][] = $student;
        }


        return $studentPerCourseAndSection;
    }

    private function createUser($data)
    {
        $password = $data['rep_DNI'];
        
        $newUser = User::create([
            'type_user_id' => 2,
            'name' => $data['rep_name'],
            'last_name' => $data['rep_last_name'],
            'DNI' => $data['rep_DNI'],
            'phone_number' => $data['rep_phone_number'],
            'email' => $data['rep_email'] ?? null,
            'password' => Hash::make($data['rep_DNI']),
            'address' => $data['address'] ?? null,
            'state' => $data['state'] ?? null,
            'city' => $data['city'] ?? null,
        ]);
        
        return $newUser;
    }

    private function createRepresentative($data, $userId)
    {
        $newRepresentative = Representative::create([

            'user_id' => $userId,
            'profession' => $data['rep_profession'] ?? null,
            'workplace' => $data['rep_workplace'] ?? null,
            'second_representative_name' => $data['second_rep_name'] ?? null,
            'second_representative_last_name' => $data['second_rep_last_name'] ?? null,
            'second_representative_DNI' => $data['second_rep_DNI'] ?? null,
            'second_representative_phone_number' => $data['second_rep_phone_number'] ?? null,
            'second_representative_email' => $data['second_rep_email'] ?? null,
            'second_representative_profession' => $data['second_rep_profession'] ?? null,
            'second_representative_workplace' => $data['second_rep_workplace'] ?? null,
        ]);

        return $newRepresentative;
    }

    private function createStudent($data,$representativeId)
    {       
        $courseSectionId = DB::table('course_sections')->select('id')->where('course_id',$data['course_id'])->where('section_id',$data['section_id'])->first();

        $newStudent = Student::create([
           
            'representative_id' => $representativeId,
            'course_section_id' => $courseSectionId->id,
            'name' => $data['student_name'],
            'last_name' => $data['student_last_name'],
            'date_birth' => $data['student_date_birth'],
            'email' => $data['student_email'] ?? null,
            'DNI' => $data['student_DNI'] ?? null,
            'phone_number' => $data['student_phone_number'] ?? null,
            'sex' => $data['student_sex'] ?? null,
            'previous_school' => $data['student_previous_school'] ?? null,
            'photo' => 'guest.webp',
        ]);

        


        return $newStudent;
    }

    private function createDocuments($request,$studentId)
    {      


        $allTypesDocuments = TypeDocument::where('status', 1)->get()->toArray();

        foreach ($allTypesDocuments as $document) 
        {   
            $documentName = $document['name'];

            if($document['required'] == 1)
            {
                if(!isset($request->$documentName));
                    throw new Exception('El '. str_replace('_', ' ',$documentName).' es requerido',400);
                
            }
            
            if(!isset($request->$documentName));
                continue;
                

            if(!TypeDocument::verifyType($request->$documentName))
                throw new Exception('Formato de '. str_replace('_', ' ',$documentName ).' no valido, Asegurese que el fomato sea pdf, jpg, jpeg, png',400);


            $documentNameSaved = Student::saveDocs($request->$documentName, false, $documentName);
            DB::table('document_students')->insert(['document' => $documentNameSaved, 'type_document_id' => $document['id'], 'student_id' => $studentId ]);


            
        }

    } 

    private function createBalance($studentId)
    {
        $configData = MainConfig::select('new_inscription_price', 'monthly_payment')->first();
        $schoolLapse = SchoolLapse::latest()->first();

        $currentDate = Carbon::now();
        $currentMonthName = strtolower($currentDate->englishMonth);
        $setValue = false;


        foreach ($this->months as $monthName => $value) 
        {
            if($monthName == $currentMonthName && $monthName !== 'august')
                $setValue = true;

            if($setValue)
            {
                $this->months[$monthName] = $configData->monthly_payment;
            }
        }

        DB::table('balance_students')->insert(
        [
            'student_id' => $studentId,
            'school_lapse_id' => $schoolLapse->id,
            'inscription' => $configData->new_inscription_price,
            'august' => $this->months['august'],
            'september' => $this->months['september'],
            'october' => $this->months['october'],
            'november' => $this->months['november'],
            'december' => $this->months['december'],
            'january' => $this->months['january'],
            'february' => $this->months['february'],
            'march' => $this->months['march'],
            'april' => $this->months['april'],
            'may' => $this->months['may'],
            'june' => $this->months['june'],
            'july' => $this->months['july'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            
        ]
        );

    }
}