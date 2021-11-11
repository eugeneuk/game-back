<?php

namespace App\Http\Controllers;

use App\Models\Game;


class TestController extends Controller
{

    public function index()
    {
        return response()->json('test');
        dd(app()->environment('local'));
        $game = Game::find(1);
        dd($game->langs->map(function ($item){
            return [
                $item->url,
                $item->lang
            ];
        }));

    }





}
