<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function adminpanel() {
        return view("adminpanel", ["items" => Product::where('deleted', '0')->get()]);
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
        Product::where('id', request("del"))->update(["deleted" => 1]);

        return redirect('/admin');
    }

    public function newitem() {
        $newproduct = Product::create(['name' => 'Name', 'price' => 0, 'image' => '/avatar.jpg', 'description' => 'Description...']);

        return redirect('/admin/products/'.$newproduct->id);
    }
}
