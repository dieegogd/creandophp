<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticuloxsucursaleRequest extends FormRequest
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
            "existencia"   => 'Existencia',
            "stockminimo"  => 'Stock Minimo',
            "articulo_id"  => 'Artículo',
            "sucursal_id" => 'Sucursal',
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
            "existencia"      => 'required|integer',
            "stockminimo"     => 'required|integer',
            "articulo_id"     => 'required|integer',
            "sucursal_id"     => 'required|integer',
        ];
    }
}
