<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionInfoRequest extends FormRequest
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
            
            "name" => "required|string|max:100|min:5",
            "rif" => "required|string|max:10",
            "phone_number" => "required|number|max:11",
            "email" => "required|email|max:30",
            "motto" => "max:100"

        ];
    }

    public function messages()
    {
        return [
            
            "name.required" => "El nombre de la institución es requerido",
            "rif.required" => "El RIF de la institución es requerido",
            "email.required" => "El correo de la institución es requerido",
            "phone_number.required" => "El numero de telefono es requerido",
            
            "name.string" => "El nombre de la institución no puede ser nulo",
            "rif.string" => "El RIF de la institución no puede ser nulo",
            "email.email" => "Asegurese de que el formato del correo sea valido",
            "phone_number.number" => "El numero de telefono tiene que ser un numero",

            "name.max" => "El nombre de la institución no puede ser mayor a 100 caracteres",
            "rif.max" => "El RIF de la institución no puede ser mayor a 10 caracteres",
            "email.max" => "El correo de la institución no puede ser mayor a 30 caracteres",
            "motto.max" => "El lema de la institución no puede ser mayor a 100 caracteres",
            "phone_number.max" => "El numero de telefono no puede ser mayor a 11 digitos",

            "name.min" => "El nombre de la institución no puede ser menor a 5 caracteres",

        ];
    }
}
