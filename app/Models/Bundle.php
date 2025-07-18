<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bundle extends Model
{
    public $fillable = [
        "name",
        "bundle_id",
        "discount",
    ];

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'bundle_product');
    }

    protected static function boot() {
        parent::boot();
        static::creating(function ($order) {
            $order->uuid = Str::uuid();
        });
    }
}
