<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Home;
use App\Services\BasketManagementService;

class AdminController extends Controller
{
    public function adminpanel() {
        // Only one row of the home table is used
        return view("adminpanel", ["home" => Home::firstOrCreate([], ["description" => "Description"]), "items" => Product::where('deleted', '0')->orderBy('created_at', 'desc')->get()]);
    }

    public function viewProduct($id) {
        // Admins can see deleted products if they like
        return view("adminproduct", ["product" => Product::find($id)]);
    }

    public function changeDescription() {
        // firstOrCreate is used as one row is used for home in the table
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
            // Sends notifications to those on waitlist
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
        // Default values
        $newproduct = Product::create(['name' => 'Name', 'price' => 0, 'image' => '/avatar.jpg', 'description' => 'Description...']);

        return redirect('/admin/products/'.$newproduct->id);
    }

    public function bundlepage() {
        // instantiate a default bundle
        session(["bundle" => session("bundle", [])]);
        return view("adminbundle");
    }

    public function bundleadd($id) {
        $bundle = session("bundle", []);

        $bundle[$id] = 1;

        session(["bundle" => $bundle]);

        return redirect('/admin/bundle');
    }

    public function bundlehandle() {
        $bundle = session("bundle", []);

        if (request('add') != null) {
            $id = request('add');
            if ($bundle[$id] < Product::find($id)->stock) {
                $bundle[$id] += 1;
            }
        }
        if (request('sub') != null) {
            $id = request('sub');
            if ($bundle[$id] > 0) {
                $bundle[$id] -= 1;
            }
            if ($bundle[$id] == 0) {
                unset($bundle[$id]);
            }
        }
        if (request('del') != null) {
            $id = request('del');
            unset($bundle[$id]);
        }
        if (request('clr') != null) {
            $bundle = [];
        }

        session(["bundle" => $bundle]);

        return redirect('/admin/bundle');
    }
}
