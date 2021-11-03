<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'field_id',
        'content_id',
        'label',
        'content',
    ];

    public function label()
    {
        return $this->belongsTo(Field::class);
    }

    public function field_content()
    {
        return $this->belongsTo(Content::class);
    }


}
