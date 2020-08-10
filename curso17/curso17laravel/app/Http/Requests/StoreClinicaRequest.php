<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasPermissionTo('clinicas_store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            "nombre"    => 'Nombre',
            "direccion" => 'Dirección',
            "telefono"  => 'Teléfono',
            "cuil"      => 'Cuil',
            "fax"       => 'Fax',
            "email"     => 'Email',
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
            "nombre"    => 'required|max:100',
            "direccion" => 'required|max:200',
            "telefono"  => 'max:100',
            "cuil"      => 'min:9|max:11',
            "fax"       => 'max:100',
            "email"     => 'required|unique:clinicas|max:255|email',
        ];
    }
}
