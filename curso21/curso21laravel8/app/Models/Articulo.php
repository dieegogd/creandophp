<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Categoria;
use App\Traits\FullSearch;
use App\Unidadmedida;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use FullSearch;
    use SoftDeletes;
    use HasFactory;

    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id'              => "N°",
        'nombre'          => "Nombre",
        'categoria_id'    => "Categoría",
        'unidadmedida_id' => "Unidad de Medida",
        'created_at'      => "Creado",
        'updated_at'      => "Modificado",
    ];

    protected $fillname = ['nombre'];

    protected $fillable = [
        'nombre',
        'categoria_id',
        'unidadmedida_id',
        'created_at',
        'updated_at',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function unidadmedida()
    {
        return $this->belongsTo(Unidadmedida::class);
    }
}
