<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   

        return 
        [
            'student_name' => $this->name,
            'student_last_name' => $this->last_name,
            'student_date_birth' => $this->date_birth,
            'student_email' => $this->email ?? null,
            'student_DNI' => $this->DNI ?? null,
            'student_phone_number' => $this->phone_number ?? null,
            'student_sex' => $this->sex,
            'student_previous_school' => $this->previous_school ?? null,
            'course_id' => $this->course_section->course_id,
            'course_name' => $this->course_section->course->name,
            'section_id' => $this->course_section->section_id,
            'section_name' => $this->course_section->section->name,
            'state' => $this->representative->user->state ?? null,
            'city' => $this->representative->user->city ?? null,
            'address' => $this->representative->user->address ?? null,
            'rep_name' => $this->representative->user->name,
            'rep_last_name' => $this->representative->user->last_name,
            'rep_DNI' => $this->representative->user->DNI,
            'rep_phone_number' => $this->representative->user->phone_number,
            'rep_email' => $this->representative->user->email ?? null,
            'rep_profession' => $this->representative->profession ?? null,
            'rep_workplace' => $this->representative->workplace ?? null,
            'second_rep_name' => $this->representative->second_representative_name ?? null,
            'second_rep_last_name' => $this->representative->second_representative_last_name ?? null,
            'second_rep_DNI' => $this->representative->second_representative_ci ?? null,
            'second_rep_phone_number' => $this->representative->second_representative_phone_number ?? null,
            'second_rep_email' => $this->representative->second_representative_email ?? null,
            'second_rep_profession' => $this->representative->second_representative_profession ?? null,
            'second_rep_workplace' => $this->representative->second_representative_workplace ?? null,


        ];
    }
}
