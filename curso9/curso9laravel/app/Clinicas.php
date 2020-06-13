<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinicas extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'direccion', 'telefono', 'fax', 'email'];
    protected $dates = ['created_at', 'updated_at'];
}
