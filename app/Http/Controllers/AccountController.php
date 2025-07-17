<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\BasketManagementService;

class AccountController extends Controller
{
    public function viewAccount() {
        return view("account");
    }

    public function editAccount() {
        return view("editaccount");
    }

    public function viewHistory() {
        return view("history", ["history" => Order::where("user_id", Auth::id())->orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function viewOrder($uuid) {
        $order = Order::where("uuid", $uuid)->first();
        $ordered = OrderProduct::where("order_id", $order->id)->get();
        return view("historyorder", ["order" => $order, "ordered" => $ordered]);
    }

    public function loginPage() {
        return view("login");
    }

    public function signupPage() {
        return view("signup");
    }

    public function login() {
        if (Auth::attempt(["email" => request('email'), "password" => request('password')])) {
            if (session("basket") != null) {
                BasketManagementService::setBasket(session("basket"));
            }
            if (session("redirect") != null) {
                $redirect = session("redirect");
                session(["redirect" => null]);
                return redirect($redirect);
            }
            return redirect("account");
        }
        return view("login", ["error" => true]);
    }

    public function logout() {
        Auth::logout();

        return redirect("login");
    }

    public function signup(Request $request) {
        $request->validate([
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        User::create([
            "name" => request("email"),
            "email" => request("email"),
            "password" => Hash::make(request("password")),
            "permission" => 0,
        ]);

        return redirect("login");
    }

    public function changeAccount(Request $request) {
        if (request("email") == Auth::user()->email) {
            $request->validate([
                "email" => "required|email",
            ]);
        }
        else {
            $request->validate([
                "email" => "required|email|unique:users",
            ]);
        }

        Auth::user()->update([
            "name" => request("name"),
            "image" => request("image"),
            "email" => request("email")
        ]);

        return redirect("account");
    }
}
