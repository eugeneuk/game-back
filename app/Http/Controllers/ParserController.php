<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Service\Parser\GameNamesParser;
use App\Service\Parser\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function index()
    {
        $game_names = (new Parser(
            'https://funpay.ru/en/',
            '.game-title a')
        )->parseNames();

        $this->saveGameNames($game_names);
        return true;
    }

    public function saveGameNames($game_names)
    {
        Game::truncate();
        foreach ($game_names as $item){
            Game::create([
                'name' => $item,
                'letter' => ucfirst(Str::limit($item, 1, null))
            ]);
        }
        return true;
    }
}
