<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\Waiting;
use App\Models\User;
use App\Notifications\InStock;

class BasketManagementService
{
    public function __construct()
    {
    }

    public static function getBasket() {
        $basket = session("basket", []);
        if (Auth::check()) {
            $basket = Cache::get(Auth::id().".session", []);
        }
        $deletedItem = false;
        foreach ($basket as $item => $amount) {
            if (!Product::find($item)) {
                unset($basket[$item]);
                $deletedItem = true;
            }
        }
        if ($deletedItem) {
            BasketManagementService::setBasket($basket);
        }
        return $basket;
    }

    public static function setBasket($basket) {
        if (Auth::check()) {
            Cache::set(Auth::id().".session", $basket);
        }
        else {
            session(["basket" => $basket]);
        }
    }

    public static function updateWaiting($product) {
        foreach (Waiting::where('product_id', $product->id)->get() as $itemjoin) {
            User::find($itemjoin->user_id)->notify(new InStock(Product::find($product->id)));
            Waiting::where('product_id', $product->id)->delete();
        }
    }
}
