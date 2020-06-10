<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicasRequest extends FormRequest
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
            'nombre'      => 'required',
            'descripcion' => 'required',
            'detalle'     => 'required',
            'domicilio'   => 'required',
            'telefonos'   => 'required',
            'fax'         => 'required',
            'email'       => 'required',
            'url'         => 'required',
            'imagen'      => 'required',
            'coordenadas' => 'required'
        ];
    }
}
