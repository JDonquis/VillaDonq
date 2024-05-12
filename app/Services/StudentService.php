<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\MainConfig;
use App\Models\TypeDocument;
use App\Models\Person\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudenService
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

        $student = $this->createStudent($data,$user->id);
        
        $this->createDocuments($request,$student->id);

        $this->createBalance($student->id);

        return $student;
        
    }

    private function createUser($data)
    {
        $password = $data['DNI'];
        
        $newUser = User::create([
            'type_user_id' => 2,
            'DNI' => $data['rep_DNI'],
            'name' => $data['rep_name'],
            'last_name' => $data['rep_last_name'],
            'email' => $data['rep_email'] ?? null,
            'password' => Hash::make($data['rep_DNI']),
            'phone_number' => $data['rep_phone_number'],
            'address' => $data['rep_address'] ?? null,
            'state' => $data['rep_state'] ?? null,
            'city' => $data['rep_city'] ?? null,
        ]);
        
        return $newUser;
    }
    private function createStudent($data,$userId)
    {       
        $courseSectionId = DB::table('course_sections')->select('id')->where('course_id',$data['course_id'])->where('section_id',$data['section_id'])->first();

        $newStudent = Student::create([
           
            'user_id' => $userId,
            'course_section_id' => $courseSectionId,
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'DNI' => $data['DNI'],
            'phone_number' => $data['phone_number'] ?? null,
            'date_birth' => $data['date_birth'],
            'address' => $data['address'] ?? null,
            'state' => $data['state'] ?? null,
            'photo' => null,
        ]);

        return $newStudent;
    }

    private function createDocument($request,$studentId)
    {      


        $allTypesDocuments = TypeDocument::where('status', 1)->get()->toArray();

        foreach ($allTypesDocuments as $document) 
        {   
            $documentName = $document['name'];

            if($document['required'] == 1)
            {
                if(!isset($request->$documentName));
                {
                    DB::rollback();
                    return back()->with( ['message' => 'El '. str_replace('_', ' ',$documentName).' es requerido','continue' => 'OK'] )->withInput();

                }
            }
            
            if(!isset($request->$documentName));
                continue;
                

            if(!TypeDocument::verifyType($request->$documentName))
            {
                DB::rollback();
                return back()->with( ['message' => 'Formato de '. str_replace('_', ' ',$documentName ).' no valido, Asegurese que el fomato sea pdf, jpg, jpeg, png','continue' => 'OK'] )->withInput();
            }

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