<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Middleware\EnsureSuperAdmin;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\NotificationController;

Route::get('/', [ProductController::class, 'viewHome'])->name('home.page');

Route::get('products', [ProductController::class, 'viewProducts'])->name('products.page');
Route::get('products/{id}', [ProductController::class, 'viewProduct'])->name('product.page');
Route::get('basket', [ProductController::class, 'viewBasket'])->name('basket.page');

Route::post('products/{id}', [ProductController::class, 'addProduct'])->name('product.request');
Route::post('basket', [ProductController::class, 'handleProduct'])->name('basket.request');

Route::get('checkout', [ProductController::class, 'checkout'])->name('checkout.page');

Route::get('login', [AccountController::class, 'loginPage'])->name('login');
Route::get('signup', [AccountController::class, 'signupPage'])->name('signup');

Route::post('login', [AccountController::class, 'login'])->name('account.auth');
Route::get('logout', [AccountController::class, 'logout'])->name('account.lose');
Route::post('signup', [AccountController::class, 'signup'])->name('account.new');

Route::get('history', [AccountController::class, 'viewHistory'])->middleware('auth')->name('history.page');

Route::get('history/{uuid}', [AccountController::class, 'viewOrder'])->middleware('auth')->name('order.page');

Route::get('account', [AccountController::class, 'viewAccount'])->middleware('auth')->name('account.page');

Route::get('account/edit', [AccountController::class, 'editAccount'])->middleware('auth')->name('account.edit.page');

Route::post('account/edit', [AccountController::class, 'changeAccount'])->middleware('auth')->name('account.request');

Route::get('admin', [AdminController::class, 'adminpanel'])->middleware(EnsureAdmin::class)->name('admin.page');
Route::get('admin/products/{id}', [AdminController::class, 'viewProduct'])->middleware(EnsureAdmin::class)->name('admin.product');

Route::post('admin', [AdminController::class, 'deleteitem'])->middleware(EnsureAdmin::class)->name('admin.del');
Route::post('admin/save', [AdminController::class, 'changeDescription'])->middleware(EnsureAdmin::class)->name('admin.del');
Route::post('admin/new', [AdminController::class, 'newitem'])->middleware(EnsureAdmin::class)->name('admin.new');
Route::post('admin/products/{id}', [AdminController::class, 'changeProduct'])->middleware(EnsureAdmin::class)->name('admin.change');

Route::get('admin/bundle', [AdminController::class, 'bundlepage'])->middleware(EnsureAdmin::class)->name('admin.bundle.page');
Route::post('admin/bundle', [AdminController::class, 'bundlehandle'])->middleware(EnsureAdmin::class)->name('admin.bundle.crequest');
Route::get('admin/bundle/add/{id}', [AdminController::class, 'bundleadd'])->middleware(EnsureAdmin::class)->name('admin.bundle.request');

Route::get('notify/{id}', [NotificationController::class, 'notify'])->middleware('auth')->name('notify.request');

Route::get('changepassword', [AccountController::class, 'viewPassword'])->middleware('auth')->name('password.page');
Route::post('changepassword', [AccountController::class, 'editPassword'])->middleware('auth')->name('password.request');

Route::get('superpanel', [SuperAdminController::class, 'adminpanel'])->middleware(EnsureSuperAdmin::class)->name('superadmin.page');
Route::post('superpanel/delete', [SuperAdminController::class, 'deleteadmin'])->middleware(EnsureSuperAdmin::class)->name('superadmin.delete.request');
Route::post('superpanel/add', [SuperAdminController::class, 'addadmin'])->middleware(EnsureSuperAdmin::class)->name('superadmin.add.request');

Route::post('query', [ProductController::class, 'queryRequest'])->name('query.request');