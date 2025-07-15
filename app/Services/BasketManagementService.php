<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BasketManagementService
{
    public function __construct()
    {
    }

    public static function getBasket() {
        if (Auth::check()) {
            return Cache::get(Auth::id().".session", []);
        }
        else {
            return session("basket", []);
        }
    }

    public static function setBasket($basket) {
        if (Auth::check()) {
            Cache::set(Auth::id().".session", $basket);
        }
        else {
            session(["basket" => $basket]);
        }
    }
}
