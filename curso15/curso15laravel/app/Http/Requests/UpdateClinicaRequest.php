<?php

namespace App\Http\Requests;

use App\Http\Requests\StoreClinicaRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicaRequest extends StoreClinicaRequest
{
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
            "email"     => 'required|unique:clinicas,email,'.$this->route()->clinica->id.',id|max:255|email',
        ];
    }
}
