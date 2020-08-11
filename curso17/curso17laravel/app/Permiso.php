<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
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

    protected $table = 'permissions';

    public function scopeFilterSearchField($query, $search, $filter) {
        $words = explode(" ", $search[$filter]);
        foreach ($words as $word) {
            $query->where($filter, 'like', '%'.$word.'%');
        }
        return $query;
    }

    public function scopeFilterSearchAll($query, $search)
    {
        foreach (Permiso::FILTERED as $filter) {
            if (isset($search[$filter]) and $search[$filter]) {
                $query->filterSearchField($search, $filter);
            }
        }
        return $query;
    }

    public function roles() {
        return $this->belongsToMany('App\Rol', 'role_has_permissions', 'permission_id', 'role_id');
    }
}
