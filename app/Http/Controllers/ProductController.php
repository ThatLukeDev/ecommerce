<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function viewProducts() {
        $products = Product::paginate(10);
        if (request('query')) {
            $searchstr = strtolower(request('query'));
            $products = Product::whereRaw('lower(name) like ? or lower(description) like ?', [ '%'.$searchstr.'%', '%'.$searchstr.'%' ])
                ->orderByRaw('name like ? desc', '%'.$searchstr.'%')->orderByRaw('instr(name, ?)', $searchstr)->paginate(10);
        }
        return view('products', ['products' => $products]);
    }
    public function viewProduct($id) {
        return view('product', ['product' => Product::find($id)]);
    }
    public function viewBasket() {
        return view('basket', ['basket' => session("basket")]);
    }

    public function addProduct($id) {
        $basket = session("basket", []);
        if (!isset($basket[$id])) {
            $basket[$id] = 0;
        }
        $basket[$id] += 1;
        session(["basket" => $basket]);

        return redirect('basket');
    }
}
