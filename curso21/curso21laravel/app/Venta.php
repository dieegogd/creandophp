<?php

namespace App;

use App\Cliente;
use App\Localidad;
use App\Traits\FullSearch;
use App\Sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use FullSearch;
    use SoftDeletes;

    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id'             => "N°",
        'fecha'          => "Fecha",
        'cliente_id'     => "Cliente",
        'sucursal_id'    => "Sucursal",
        'localidad_id'   => "Localidad",
        'total'          => "Total",
        'created_at'     => "Creado",
        'updated_at'     => "Modificado",
    ];

    protected $fillname = ['nombre'];

    protected $fillable = [
        'fecha',
        'cliente_id',
        'sucursal_id',
        'localidad_id',
        'total',
        'created_at',
        'updated_at',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

}
