<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Services\BasketManagementService;

class ProductController extends Controller
{
    public function viewProducts() {
        $products = Product::where('deleted', '0')->paginate(10);
        if (request('query')) {
            $searchstr = strtolower(request('query'));
            $products = Product::whereRaw('deleted = 0 and (lower(name) like ? or lower(description) like ?)', [ '%'.$searchstr.'%', '%'.$searchstr.'%' ])
                ->orderByRaw('name like ? desc', '%'.$searchstr.'%')->orderByRaw('instr(name, ?)', $searchstr)->paginate(10);
        }
        return view('products', ['products' => $products]);
    }
    public function viewProduct($id) {
        return view('product', ['product' => Product::find($id)]);
    }
    public function viewBasket() {
        return view('basket', ['basket' => BasketManagementService::getBasket()]);
    }

    public function addProduct($id) {
        $basket = BasketManagementService::getBasket();
        if (!isset($basket[$id])) {
            $basket[$id] = 0;
        }
        $basket[$id] += 1;
        BasketManagementService::setBasket($basket);

        return redirect('basket');
    }

    public function handleProduct() {
        $basket = BasketManagementService::getBasket();

        if (request('add') != null) {
            $id = request('add');
            $basket[$id] += 1;
        }
        if (request('sub') != null) {
            $id = request('sub');
            if ($basket[$id] > 0) {
                $basket[$id] -= 1;
            }
            if ($basket[$id] == 0) {
                unset($basket[$id]);
            }
        }
        if (request('del') != null) {
            $id = request('del');
            unset($basket[$id]);
        }
        if (request('clr') != null) {
            $basket = [];
        }

        BasketManagementService::setBasket($basket);

        return redirect('basket');
    }

    public function checkout() {
        $basket = BasketManagementService::getBasket();

        if ($basket != []) {
            $order = Order::create([
                "user_id" => Auth::id(),
            ]);

            foreach ($basket as $productid => $amount) {
                $order->products()->attach(Product::find($productid), ["amount" => $amount]);
            }
        }

        BasketManagementService::setBasket([]);

        return view("checkout", ["basket" => $basket]);
    }
}
