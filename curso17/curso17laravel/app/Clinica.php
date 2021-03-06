<?php

namespace App;

use App\User;
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
        'user_id',
        "fax",
        "email",
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
        foreach (Clinica::FILTERED as $filter) {
            if (isset($search[$filter]) and $search[$filter]) {
                $query->filterSearchField($search, $filter);
            }
        }
        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
