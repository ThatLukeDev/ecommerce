<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public $table = "basket";

    protected $fillable = [
        'user_id',
        'item_id',
        'amount',
    ];
}
