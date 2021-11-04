<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'letter', 'description', 'image', 'meta_d'];

    public function products()
    {
        return $this->hasMany(Game::class);
    }

    public function fields()
    {
        return $this->hasMany(Field::class);
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
                \App\Filters\Search::class,
                \App\Filters\Sort::class,
            ])
            ->thenReturn();
    }
}
