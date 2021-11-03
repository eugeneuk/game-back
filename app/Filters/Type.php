<?php

namespace App\Filters;
use Closure;

class Type extends Filter
{

    protected function applyFilter($builder)
    {
        return $builder->where('type_id', request($this->filterName()));
    }
}
