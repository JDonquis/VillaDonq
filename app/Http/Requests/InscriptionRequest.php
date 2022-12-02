<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Documents\Type_Document;
class InscriptionRequest extends FormRequest
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
        return [
        
        "year" => "required|string|max:1",
        "name" => "required|string|max:30",
        "last_name" => "required|string|max:30",
        "DNI" => "required|string|max:10",
        "age" => "numeric",
        "email" => "required|string|max:30|email",
        "phone_number" => "string|max:11|min:11",
        "date_birth" => "required|date",
        "state" => "string|max:20|nullable",
        "city" => "string|max:20|nullable",
        "address" => "string|max:100",
        "rep_name" => "required|string|max:30",
        "rep_DNI" => "required|string|max:10",
        "rep_phone_number" => "required|string|max:11",
 
        
        ];
    }

    // public static function required_or_not($attribute)
    // {
    //     $docs = Type_Document::where("name",$attribute)->where("required",1)->where("status",1)->get();

    //     return $docs->isEmpty();
    // }

       /**
     * Get the error messages for the defined validation rules.
     * ñ
     * @return array
     */
    public function messages()
    {
        return [
            'year.required' => 'El campo año es requerido',
            'name.required' => 'El campo nombre es requerido',
            'last_name.required' => 'El campo apellido es requerido',
            'DNI.required' => 'El campo C.I es requerido',
            'email.required' => 'El campo email es requerido',
            'date_birth.required' => 'El campo fecha de nacimiento es requerido',
            'cer_birth_up.required' => 'El documento Partida de nacimiento es requerido',
            'cer_notes_up.required' => 'El documento notas certificadas es requerido',
            'cer_conduct_up.required' => 'El documento certificado de buena conducta es requerido',
            'report_card_up.required' => 'El documento boleta es requerido',
            'rep_name.required' => 'El campo nombre completo del representante es requerido',
            'rep_DNI.required' => 'El campo cedula del representante es requerido',
            'rep_phone_number.required' => 'El campo numero de telefono del representante es requerido',
            'photo_up.required' => 'El documento Foto es requerido',

            'state.string' => 'Nombre del estado invalido',
            'city.string' => 'Nombre de la ciudad invalido',
            'phone_number.string' => 'Campo numero de telefono invalido',
            "address.string" => "Direccion invalida",
            
            'year.max' => 'Año invalido, intente nuevamente',
            'name.max' => 'Nombre demasiado largo, intente que el nombre no sobrepase de los 30 caracteres',
            'last_name.max' => 'Apellido demasiado largo, intente que el apellido no sobrepase de los 30 caracteres',
            'DNI.max' => 'C.I invalida, asegurese que no sobrepase de los 10 caracteres',
            'phone_number.max' => 'Numero de telefono invalido, intente que el numero no sobrepase de los 11 caracteres',
            'state.max' => 'Nombre del estado demasiado largo, intente que el nombre no sobrepase de los 20 caracteres',
            'city.max' => 'Nombre de la ciudad demasiado largo, intente que el nombre no sobrepase de los 20 caracteres',
            'address.max' => 'Dirección demasiada larga, intente que la dirección no sobrepase de los 100 caracteres',
            'rep_name.max' => 'Nombre demasiado largo, intente que el nombre no sobrepase de los 30 caracteres',
            'rep_DNI.max' => 'C.I invalida, asegurese que no sobrepase de los 10 caracteres',
            'rep_phone_number.max' => 'Numero de telefono invalido, intente que el numero no sobrepase de los 11 caracteres',

            'rep_phone_number.min' => 'Numero de telefono invalido, intente que el numero no sea menor de los 11 caracteres',
            'phone_number.min' => 'Numero de telefono invalido, intente que el numero no sea menor de los 11 caracteres',

            'age.numeric' => 'Asegurese de colocar la fecha de nacimiento',

            'email.email' => 'Campo correo invalido, asegurese de colocar correctamente el correo',
            


        ];
    }
}


