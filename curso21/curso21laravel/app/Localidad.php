<?php

namespace App;

use App\Traits\FullSearch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Localidad extends Model
{
    use FullSearch;
    use SoftDeletes;

    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id'         => "N°",
        'nombre'     => "Nombre",
        'created_at' => "Creado",
        'updated_at' => "Modificado",
    ];

    protected $fillname = ['nombre'];

    protected $fillable = [
        'nombre',
        'created_at',
        'updated_at',
    ];
}
