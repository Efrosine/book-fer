<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'writer_id', 'image_url', 'genre', 'price'];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($image_url) => url('/storage/' . $image_url),
        );
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }
}
