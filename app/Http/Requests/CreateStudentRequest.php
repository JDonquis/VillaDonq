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
            'name' => ['required'],
            'last_name' => ['required'],
            'DNI' => ['required'],
            'date_birth' => ['required'],
            'course_id' => ['required'],
            'section_id' => ['required'],
            'phone_number' => ['sometimes'],
            'rep_name' => ['sometimes'],
            'rep_last_name' => ['sometimes'],
            'rep_DNI' => ['required'],
            'rep_phone_number' => ['required'],
            'rep_email' => ['sometimes'],
            'rep_state' => ['sometimes'],
            'rep_city' => ['sometimes'],


        ];
    }
}
