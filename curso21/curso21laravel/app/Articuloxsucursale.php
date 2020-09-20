<?php

namespace App;

use App\Articulo;
use App\Traits\FullSearch;
use App\Sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articuloxsucursale extends Model
{
    use FullSearch;
    use SoftDeletes;

    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id'           => "N°",
        'articulo_id'  => "Artículo",
        'sucursal_id' => "Sucursal",
        'existencia'       => "Existencia",
        'stockminimo'       => "Stock Minimo",
        'created_at'   => "Creado",
        'updated_at'   => "Modificado",
    ];

    protected $fillname = ['nombre'];

    protected $fillable = [
        'articulo_id',
        'sucursal_id',
        'existencia',
        'stockminimo',
        'created_at',
        'updated_at',
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}
