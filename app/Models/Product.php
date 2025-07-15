<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Number;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description'
    ];

    public function formattedPrice(): Attribute {
        return Attribute::make(
            get: fn () => Number::currency($this->price, in: 'gbp'),
        );
    }
}
