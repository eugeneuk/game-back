<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] =
            $this->game( $this->attributes['game_id'] ) . " " . $this->attributes['label'];
    }

    public function game(int $id)
    {
        return Game::find($id)->name ?? '';
    }

    public function vals()
    {
        return $this->hasMany(Content::class, 'field_id', 'id');
    }
}
