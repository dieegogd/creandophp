<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    const PAGINATE_LIST = [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100];
    const PAGINATE_DEFAULT = 10;

    const FILTERED = [
        'id',
        'name',
        'guard_name',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        "name",
        "guard_name",
    ];

    protected $table = 'roles';

    public function scopeFilterSearchField($query, $search, $filter) {
        $words = explode(" ", $search[$filter]);
        foreach ($words as $word) {
            $query->where($filter, 'like', '%'.$word.'%');
        }
        return $query;
    }

    public function scopeFilterSearchAll($query, $search)
    {
        foreach (Rol::FILTERED as $filter) {
            if (isset($search[$filter]) and $search[$filter]) {
                $query->filterSearchField($search, $filter);
            }
        }
        return $query;
    }
}
