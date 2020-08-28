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
        $model = substr($filter, 0, -3);
        $model = '\\App\\'.ucwords($model);
        $model = \App::make($model);
        $tid   = $model->getKeyName();
        $tbl   = $model->getTable();
        $tbf   = $model->getFillname();

        $q1 = \DB::table($tbl);
        $words = explode(" ", $search[$filter]);
        foreach ($words as $word) {
            $q1->where(function($q2) use ($tbf, $word) {
                foreach ($tbf as $fn) {
                    $q2->orWhere($fn, 'like', '%'.$word.'%');
                }
            });
        }
        $ids = $q1->pluck($tid);

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

    public function getFillname()
    {
        return $this->fillname;
    }
}
