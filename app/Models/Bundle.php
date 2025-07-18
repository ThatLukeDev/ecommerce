<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bundle extends Model
{
    use HasUuids;

    public $fillable = [
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
