<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Product;
use App\Service\Search;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;
use FedEx\RateService\Request;
use FedEx\RateService\ComplexType;
use FedEx\RateService\SimpleType;


class TestController extends Controller
{

    public function index()
    {
        $game = Game::find(1);
        dd($game->langs->map(function ($item){
            return [
                $item->url,
                $item->lang
            ];
        }));

    }





}
