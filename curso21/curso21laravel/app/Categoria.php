<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id',
        'nombre',
    ];

    protected $fillable = [
        "nombre",
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
        foreach (Categoria::FILTERED as $filter) {
            if (isset($search[$filter]) and $search[$filter]) {
                $query->filterSearchField($search, $filter);
            }
        }
        return $query;
    }
}
