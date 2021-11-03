<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductTypesResorce;
use App\Models\Type;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    public function getTypes()
    {
        return new ProductTypesResorce(Type::all());
    }


}
