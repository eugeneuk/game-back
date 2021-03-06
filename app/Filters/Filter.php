<?php

namespace App\Filters;
use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    public function handle($request, Closure $next)
    {
        if( !request()->has($this->filterName()) )
            return $next($request);

        if( request()->has( $this->filterName() ) && request($this->filterName()) == 'all')
            return $next($request);

        $builder = $next($request);

        return $this->applyFilter($builder);
    }

    protected abstract function applyFilter($builder);

    protected function filterName()
    {
        return Str::snake(class_basename($this));
    }

    protected function getManyValues()
    {
        return array_unique( explode(',', request($this->filterName())) );
    }
}
