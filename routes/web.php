<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('products', [ProductController::class, 'viewProducts'])->name('products.page');
Route::get('products/{id}', [ProductController::class, 'viewProduct'])->name('product.page');
Route::get('basket', [ProductController::class, 'viewBasket'])->name('basket.page');

Route::post('products/{id}', [ProductController::class, 'addProduct'])->name('product.add');