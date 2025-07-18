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
        // Disallow different user to view
        if ($order->user_id != Auth::id()) {
            return redirect("login");
        }
        // Uses a join table field for the amount of products
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
            // Save the users basket on signup/signin
            if (session("basket") != null) {
                BasketManagementService::setBasket(session("basket"));
            }
            // For some redirects to the login page, a redirect session flag is set which overrides the default account page
            if (session("redirect") != null) {
                $redirect = session("redirect");
                session(["redirect" => null]);
                return redirect($redirect);
            }
            return redirect("account");
        }
        // Failed to login
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
            // Permission [0 -> user, 1 -> admin, 2 -> god]
            "permission" => 0,
        ]);

        return redirect("login");
    }

    public function changeAccount(Request $request) {
        // Allows a user to keep their email as the same thing
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
