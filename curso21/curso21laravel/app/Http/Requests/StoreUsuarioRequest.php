<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            "name"                  => 'Nombre',
            "email"                 => 'Email',
            "password"              => 'Contraseña',
            "password_confirmation" => 'Repetir Contraseña',
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
            "name"                  => 'required|max:190',
            "email"                 => 'required|email:rfc|unique:users',
            "password"              => 'required|min:6|confirmed',
        ];
    }
}
