<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinica extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "nombre",
        "direccion",
        "telefono",
        "cuil",
        "fax",
        "email",
    ];
}
