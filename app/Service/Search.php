<?php

namespace App\Service;

use App\Models\Game;
use App\Models\Product;

class Search
{
    protected $qty;

    public function __construct($qty = 5)
    {
        $this->qty = $qty;
    }

    // Search by GET param `?search=Some thing`
    public function handle()
    {
        $games = Game::where('name', 'like', '%' . request('search') . '%')->take($this->qty)->get();
        $products = Product::where('name', 'like', '%' . request('search') . '%')->take($this->qty)->get();


        return [
             $games,
             $products
        ];
    }
}
