<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }


    public function contents()
    {
        return $this->belongsToMany(Content::class);
    }

    // Result fields
    public function fields()
    {
        return $this->hasMany(Result::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /*
     *  Filters, @see /App/Filters
     * use Laravel Pipelines funcitonal
     */
    public static function getFiltered()
    {
        return app(\Illuminate\Pipeline\Pipeline::class)
            ->send(Product::query())
            ->through([
                \App\Filters\Type::class,
                \App\Filters\Search::class,
                \App\Filters\GameId::class,
                \App\Filters\Sort::class,
                \App\Filters\Fields::class,
            ])
            ->thenReturn();
    }


}
