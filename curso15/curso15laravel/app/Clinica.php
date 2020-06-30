<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinica extends Model
{
    use SoftDeletes;

    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    protected $fillable = [
        "nombre",
        "direccion",
        "telefono",
        "cuil",
        "fax",
        "email",
    ];
}
