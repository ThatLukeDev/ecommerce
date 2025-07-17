<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Home;
use App\Services\BasketManagementService;

class AdminController extends Controller
{
    public function adminpanel() {
        return view("adminpanel", ["home" => Home::firstOrCreate([], ["description" => "Description"]), "items" => Product::where('deleted', '0')->orderBy('created_at', 'desc')->get()]);
    }

    public function viewProduct($id) {
        return view("adminproduct", ["product" => Product::find($id)]);
    }

    public function changeDescription() {
        Home::firstOrCreate([], ['description' => "Description"])->update([
            "description" => request('description'),
        ]);

        return redirect('/admin');
    }

    public function changeProduct($id) {
        if (request('stock') < 0) {
            return redirect('/admin/products/'.$id);
        }
        else {
            BasketManagementService::updateWaiting(Product::find($id));
        }
        Product::find($id)->update([
            "name" => request('name'),
            "price" => request('price'),
            "image" => request('image'),
            "description" => request('description'),
            "stock" => request('stock'),
            "featured" => request('featured') ? '1' : '0',
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
