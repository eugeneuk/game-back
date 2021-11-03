<?php

namespace App\Filters;

class Search extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where('name', 'like', '%' . request($this->filterName()) . '%');
    }
}
