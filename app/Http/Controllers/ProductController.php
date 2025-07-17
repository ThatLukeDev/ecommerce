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
        $products = Product::where('deleted', '0')->orderBy('created_at', 'desc')->paginate(12);
        if (request('query')) {
            $searchstr = strtolower(request('query'));
            $products = Product::whereRaw('deleted = 0 and (lower(name) like ? or lower(description) like ?)', [ '%'.$searchstr.'%', '%'.$searchstr.'%' ])
                ->orderByRaw('name like ? desc', '%'.$searchstr.'%')->orderByRaw('instr(name, ?)', $searchstr)->paginate(12);
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
            if ($basket[$id] < Product::find($id)->stock) {
                $basket[$id] += 1;
            }
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
        if (!Auth::check()) {
            session(["redirect" => "basket"]);
            return redirect("login");
        }

        $basket = BasketManagementService::getBasket();

        $overflow = false;
        foreach ($basket as $productid => $amount) {
            if ($amount > Product::find($productid)->stock) {
                $overflow = true;
                $basket[$productid] = Product::find($productid)->stock;
            }
        }
        if ($overflow) {
            BasketManagementService::setBasket($basket);
            return view("basket", ["basket" => $basket, "error" => "An item has had to be rescinded due to low stock."]);
        }

        if ($basket != []) {
            $order = Order::create([
                "user_id" => Auth::id(),
            ]);

            foreach ($basket as $productid => $amount) {
                $order->products()->attach(Product::find($productid), ["amount" => $amount]);
                Product::where('id', $productid)->update([
                    "stock" => Product::find($productid)->stock - $amount
                ]);
            }
        }

        BasketManagementService::setBasket([]);

        return view("checkout", ["basket" => $basket]);
    }
}
