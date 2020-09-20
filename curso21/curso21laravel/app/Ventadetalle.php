<?php

namespace App;

use App\Venta;
use App\Articulo;
use App\Traits\FullSearch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ventadetalle extends Model
{
    use FullSearch;
    use SoftDeletes;

    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id'             => "N°",
        'venta'          => "Venta",
        'articulo_id'    => "Artículo",
        'cantidad'       => "Cantidad",
        'precio'         => "Precio",
        'subtotal'       => "Subtotal",
        'created_at'     => "Creado",
        'updated_at'     => "Modificado",
    ];

    protected $fillname = ['nombre'];

    protected $fillable = [
        'venta_id',
        'articulo_id',
        'cantidad',
        'precio',
        'subtotal',
        'created_at',
        'updated_at',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}
