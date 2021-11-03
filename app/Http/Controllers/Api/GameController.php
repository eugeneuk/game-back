<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Http\Resources\SimpleGameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        return GameResource::collection(Game::get());
    }


    public function show(Game $game)
    {
        return new SimpleGameResource($game);
    }


}
