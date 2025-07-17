<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Waiting extends Model
{
    use HasUuids;

    protected $fillable = [
        "user_id",
        "product_id"
    ];
}
