<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVentaRequest extends FormRequest
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
    public function attributes()
    {
        return [
            "fecha"        => 'Fecha',
            "cliente_id"   => 'Cliente',
            "sucursal_id"  => 'Sucursal',
            "localidad_id" => 'Localidad',
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
            "fecha"          => 'required|date',
            "cliente_id"     => 'required|integer',
            "sucursal_id"    => 'required|integer',
            "localidad_id"   => 'required|integer',
        ];
    }
}
