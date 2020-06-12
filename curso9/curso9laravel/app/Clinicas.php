<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinicas extends Model
{
    protected $fillable = ['nombre', 'direccion', 'telefono', 'fax', 'email'];
}
