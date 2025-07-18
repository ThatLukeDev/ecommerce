<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\Waiting;
use App\Models\User;
use App\Notifications\InStock;

/// The basket is represented in the form `[$id => $amount]`
/// where `$id` is the item id and `$amount` is the number of products
/// the user has in their basket.
///
/// Input and output to the `getBasket` and `setBasket` functions respectively
/// will be in this form, and the class abstracts which version of the basket
/// (session if not signed in, database if signed in) is used.
///
/// ```
/// BasketManagementService::getBasket();
/// ```
/// ->
/// ```
/// [27 => 4, 36 => 2, 12 => 1]
/// ```
///
/// ```
/// BasketManagementService::setBasket([27 => 4, 36 => 2, 12 => 1]);
/// ```
/// ->
/// ```
/// assert(BasketManagementService::getBasket() == [27 => 4, 36 => 2, 12 => 1]);
/// ```
///
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
