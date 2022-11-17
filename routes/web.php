<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('admin/product', ProductController::class);
Route::get('admin/product-edit/{id}', [ProductController::class,'edit']);

Route::resource('admin/category', CategoryController::class);
Route::get('admin/category-edit/{id}', [CategoryController::class, 'edit']);

Route::resource('admin/store', StoreController::class);
Route::get('admin/store-edit/{id}', [StoreController::class, 'edit']);

Route::resource('admin/order', OrderDetailsController::class);
Route::get('admin/order-edit/{id}', [OrderDetailsController::class, 'edit']);

Route::get('/admin', function () {
    return view('admin.home');
});

//routing landingpage
Route::get('/', function () {
    return view('landingpage.home');
});

//routing landingpage
Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/shop', function () {
    return view('landingpage.shop');
});

Route::get('/shop-single', function () {
    return view('landingpage.shop-single');
});

Route::get('/contact', function () {
    return view('landingpage.contact');
});