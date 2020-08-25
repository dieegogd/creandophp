<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id'         => "N°",
        'nombre'     => "Nombre",
        'created_at' => "Creado",
        'updated_at' => "Modificado",
    ];

    protected $fillable = [
        'nombre',
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
        foreach (Localidad::FILTERED as $key => $value) {
            if (isset($search[$key]) and $search[$key]) {
                $query->filterSearchField($search, $key);
            }
        }
        return $query;
    }
}
