<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $fillable = ['name', 'image_url'];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($image_url) => url('/storage/' . $image_url),
        );
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
