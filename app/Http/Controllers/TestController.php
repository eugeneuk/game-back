<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;
use FedEx\RateService\Request;
use FedEx\RateService\ComplexType;
use FedEx\RateService\SimpleType;


class TestController extends Controller
{

    public function index()
    {
        $prods = Product::query();

        $prods = $prods->whereHas('results', function($q) {
            $q->whereIn('field_id', [1,2,3]);
        });

        dd($prods->count());
    }





}
