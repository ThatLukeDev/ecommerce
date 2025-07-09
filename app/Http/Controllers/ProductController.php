<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function viewProducts() {
        $products = Product::paginate(10);
        return view('products', ['products' => $products]);
    }
}
