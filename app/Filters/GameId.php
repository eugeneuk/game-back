<?php

namespace App\Filters;

use Closure;

class GameId extends Filter
{

    protected function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }
}
