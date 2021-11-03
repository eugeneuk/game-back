<?php

namespace App\Filters;

class Fields extends Filter
{
    public function applyFilter($builder)
    {
        $field_ids = $this->getManyValues(); //Multiple IDS
        return $builder->whereHas('results', function($q) use($field_ids){
            $q->whereIn('field_id', $field_ids);
        });
    }


}
