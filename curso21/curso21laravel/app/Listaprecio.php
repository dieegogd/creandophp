<?php

namespace App;

use App\Articulo;
use App\Traits\FullSearch;
use App\Localidad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listaprecio extends Model
{
    use FullSearch;
    use SoftDeletes;

    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id'           => "N°",
        'articulo_id'  => "Artículo",
        'localidad_id' => "Localidad",
        'precio'       => "Precio",
        'created_at'   => "Creado",
        'updated_at'   => "Modificado",
    ];

    protected $fillname = ['nombre'];

    protected $fillable = [
        'precio',
        'articulo_id',
        'localidad_id',
        'created_at',
        'updated_at',
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
}
