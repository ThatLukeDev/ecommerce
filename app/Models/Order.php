<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'uuid',
        'address1',
        'address2',
        'postcode',
        'county',
        'city',
        'country',
        'user_id',
    ];

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'order_products')->using(OrderProduct::class)->withTimestamps();
    }

    // uuids are used to protect the number of orders of each user
    protected static function boot() {
        parent::boot();
        static::creating(function ($order) {
            $order->uuid = Str::uuid();
        });
    }
}
