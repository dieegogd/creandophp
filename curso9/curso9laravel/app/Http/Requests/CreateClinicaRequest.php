<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClinicaRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'nombre'    => 'Nombre',
            'direccion' => 'Dirección',
            'telefono'  => 'Teléfono',
            'fax'       => 'Fax',
            'email'     => 'Email',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'    => 'required|max:100',
            'direccion' => 'required|max:100',
            'telefono'  => 'required|max:20',
            'fax'       => 'required|max:20',
            'email'     => 'required|email|max:250',
        ];
    }
}
