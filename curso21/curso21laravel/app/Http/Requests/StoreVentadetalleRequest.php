<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVentadetalleRequest extends FormRequest
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
            "venta_id"     => 'Venta',
            "articulo_id"  => 'Artículo',
            "cantidad"     => 'Cantidad',
            "precio"       => 'Precio',
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
            "venta_id"     => 'required|integer',
            "articulo_id"  => 'required|integer',
            "cantidad"     => 'required|integer|min:1',
            "precio"       => 'required|Numeric|min:1',
        ];
    }
}
