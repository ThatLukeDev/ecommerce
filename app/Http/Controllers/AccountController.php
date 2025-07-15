<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
