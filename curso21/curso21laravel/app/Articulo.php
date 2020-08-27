<?php

namespace App;

use App\Categoria;
use App\Unidadmedida;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
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

    protected $fillable = [
        'nombre',
        'categoria_id',
        'unidadmedida_id',
        'created_at',
        'updated_at',
    ];

    public function scopeFilterSearchField($query, $search, $filter) {
        $words = explode(" ", $search[$filter]);
        foreach ($words as $word) {
            $query->where($filter, 'like', '%'.$word.'%');
        }
        return $query;
    }

    public function scopeFilterSearchAll($query, $search)
    {
        foreach (Articulo::FILTERED as $key => $value) {
            if (isset($search[$key]) and $search[$key]) {
                $query->filterSearchField($search, $key);
            }
        }
        return $query;
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function unidadmedida()
    {
        return $this->belongsTo(Unidadmedida::class);
    }
}
