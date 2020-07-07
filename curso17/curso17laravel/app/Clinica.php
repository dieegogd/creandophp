<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinica extends Model
{
    use SoftDeletes;

    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id',
        'nombre',
        'direccion',
        'telefono',
        'fax',
        'email',
        'created_at',
    ];

    protected $fillable = [
        "nombre",
        "direccion",
        "telefono",
        "cuil",
        "fax",
        "email",
    ];

    // $query->filterSearchField($search, $filter);
    public function scopeFilterSearchField($query, $search, $filter) {
        $words = explode(" ", $search[$filter]);
        // $words = ["dr", "parker"];
        foreach ($words as $word) {
            $query->where($filter, 'like', '%'.$word.'%');
        }
        // WHERE nombre LIKE '%dr parker%'
        // >>
        // WHERE nombre LIKE '%dr%' AND nombre LIKE '%parker%'
        return $query;
    }

    // $clinicas->filterSearchAll($search);
    public function scopeFilterSearchAll($query, $search)
    {
        foreach (Clinica::FILTERED as $filter) {
            if (isset($search[$filter]) and $search[$filter]) {
                $query->filterSearchField($search, $filter);
            }
        }
        return $query;
    }

}
