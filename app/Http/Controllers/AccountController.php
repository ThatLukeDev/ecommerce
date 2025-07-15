<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AccountController extends Controller
{
    public function viewAccount() {
        return view("account");
    }

    public function loginPage() {
        return view("login");
    }

    public function signupPage() {
        return view("signup");
    }

    public function login() {
        if (Auth::attempt(["email" => request('email'), "password" => request('password')])) {
            return redirect("account");
        }
        return view("login", ["error" => true]);
    }

    public function logout() {
        Auth::logout();

        return view("login");
    }

    public function signup() {
        if (request("password") != request("password2")) {
            return view("signup", ["error" => "Passwords do not match"]);
        }

        User::create([
            "name" => request("email"),
            "email" => request("email"),
            "password" => Hash::make(request("password")),
            "permission" => 0,
        ]);

        return redirect("login");
    }
}
