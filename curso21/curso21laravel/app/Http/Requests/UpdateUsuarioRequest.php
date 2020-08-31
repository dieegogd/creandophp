<?php

namespace App\Http\Requests;

use App\Http\Requests\StoreUsuarioRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends StoreUsuarioRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"  => 'required|max:190',
            "email" => 'required|email:rfc|unique:users,email,'.$this->route()->usuario->id.',id',
        ];
    }
}
