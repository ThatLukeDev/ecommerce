<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    // Interim table
    protected $table = "order_products";
    public $timestamps = true;
}
