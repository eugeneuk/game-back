<?php

namespace App\Filters;

class SortByPrice
{
    protected function applyFilter($builder)
    {
        return $builder->orderBy('price', request($this->filterName()));
    }
}
