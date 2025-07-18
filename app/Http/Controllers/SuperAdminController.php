<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SuperAdminController extends Controller
{
    public function adminpanel() {
        return view("super/panel", ["admins" => User::where('permission', 1)->get()]);
    }

    public function deleteadmin() {
        User::where('id', request("del"))->update(["permission" => 0]);

        return redirect('/superpanel');
    }

    public function addadmin() {
        User::where('email', request("add"))->update(["permission" => 1]);

        return redirect('/superpanel');
    }
}
