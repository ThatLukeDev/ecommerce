<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InStock;
use App\Models\Product;
use App\Models\Waiting;

class NotificationController extends Controller
{
    public function notify($id) {
        // Auth::user()->notify(new InStock(Product::find($id)));
        // Adds to wait list
        Waiting::create([
            'product_id' => $id,
            'user_id' => Auth::id()
        ]);

        return redirect('/');
    }
}
