<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticuloRequest extends FormRequest
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
            "nombre"          => 'Nombre',
            "categoria_id"    => 'Categoría',
            "unidadmedida_id" => 'Unidad de Medida',
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
            "nombre"          => 'required|max:100',
            "categoria_id"    => 'required|integer',
            "unidadmedida_id" => 'required|integer',
        ];
    }
}
