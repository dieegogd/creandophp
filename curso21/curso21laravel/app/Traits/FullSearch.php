<?php
namespace App\Traits;

trait FullSearch
{
    public function scopeFilterSearchField($query, $search, $filter) {
        $words = explode(" ", $search[$filter]);
        foreach ($words as $word) {
            $query->where($filter, 'like', '%'.$word.'%');
        }
        return $query;
    }

    public function scopeFilterSearchTable($query, $search, $filter) {
        $table = substr($filter, 0, strlen($filter) - 3)."s";
        $ids = \DB::table($table)->where("nombre", "LIKE", '%'.$search[$filter].'%')->pluck('id')->toArray();
        $words = explode(" ", $search[$filter]);
        $query->whereIn($filter, $ids);
        return $query;
    }

    public function scopeFilterSearchAll($query, $search, $filtered)
    {
        foreach ($filtered as $key => $value) {
            if (isset($search[$key]) and $search[$key]) {
                if (substr($key, -3, 3) == '_id') {
                    $query->filterSearchTable($search, $key);
                } else {
                    $query->filterSearchField($search, $key);
                }
            }
        }
        return $query;
    }
}
