<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function adminpanel() {
        return view("adminpanel", ["items" => Product::all()]);
    }

    public function viewProduct($id) {
        return view("adminproduct", ["product" => Product::find($id)]);
    }

    public function changeProduct($id) {
        Product::find($id)->update([
            "name" => request('name'),
            "price" => request('price'),
            "image" => request('image'),
            "description" => request('description'),
        ]);

        return redirect('/admin/products/'.$id);
    }

    public function deleteitem() {
        Product::find(request("del"))->delete();

        return redirect('/admin');
    }
}
