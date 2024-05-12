<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
        [
            'student_name' => ['required'],
            'student_last_name' => ['required'],
            'student_date_birth' => ['required'],
            'student_email' => ['sometimes'],
            'student_DNI' => ['sometimes'],
            'student_phone_number' => ['sometimes'],
            'student_sex' => ['sometimes'],
            'student_previous_school' => ['sometimes'],
            'course_id' => ['required'],
            'section_id' => ['required'],
            'state' => ['sometimes'],
            'city' => ['sometimes'],
            'address' => ['sometimes'],
            'rep_name' => ['required'],
            'rep_last_name' => ['required'],
            'rep_DNI' => ['required'],
            'rep_phone_number' => ['required'],
            'rep_email' => ['sometimes'],
            'rep_profession' => ['sometimes'],
            'rep_workplace' => ['sometimes'],
            'second_rep_name' => ['sometimes'],
            'second_rep_last_name' => ['sometimes'],
            'second_rep_DNI' => ['sometimes'],
            'second_rep_phone_number' => ['sometimes'],
            'second_rep_email' => ['sometimes'],
            'second_rep_profession' => ['sometimes'],
            'second_rep_workplace' => ['sometimes'],

        ];
    }
}
