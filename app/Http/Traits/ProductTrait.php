<?php

namespace App\Http\Traits;

use App\Models\Game;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

trait ProductTrait{

    // Create and return product
    public function makeProduct(Request $request)
    {
        $product            = new Product();
        $product->name      = $request->name;
        $product->price     = $request->price;
        $product->game_id   = $request->game_id;
        $product->price     = $request->price;
        $product->user_id   = Auth::id();
        $product->type_id   = $request->type_id;
        if($product->save())
            return $product;

        return false;
    }

    // Get fields of current Game
    private function getFields(Request $request)
    {
        if($request->has('fields')) {
            $fields = explode(',', $request->fields);
            $result = [];
            foreach ($fields as $key => $value) {
                //If array's string is empty, continue
                if ($value == '')
                    continue;

                $result[$key] = $value;
            }
            return $result;
        }
        // If there are no Additional Fields In Request , just return false
        return false;
    }

    // Get game list for selection
    public function getGames()
    {
        return json_encode(['success' => true, 'games' => Game::all()]);
    }


}
