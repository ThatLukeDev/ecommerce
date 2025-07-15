<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('home');
});

Route::get('products', [ProductController::class, 'viewProducts'])->name('products.page');
Route::get('products/{id}', [ProductController::class, 'viewProduct'])->name('product.page');
Route::get('basket', [ProductController::class, 'viewBasket'])->name('basket.page');

Route::post('products/{id}', [ProductController::class, 'addProduct'])->name('product.request');
Route::post('basket', [ProductController::class, 'handleProduct'])->name('basket.request');

Route::get('login', [AccountController::class, 'loginPage'])->name('account.login');
Route::get('signup', [AccountController::class, 'signupPage'])->name('account.login');

Route::post('login', [AccountController::class, 'login'])->name('account.auth');
Route::post('signup', [AccountController::class, 'signup'])->name('account.new');

Route::get('account', [AccountController::class, 'viewAccount'])->middleware(EnsureAdmin::class)->name('account.page');