<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\OrdersController;
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
Route::get('/admin', [DashboardController::class, 'index' ]);

Route::resource('admin/product', ProductController::class);
Route::get('admin/product-edit/{id}', [ProductController::class,'edit']);
Route::get('admin/product-generate-pdf', [ProductController::class, 'generatePDF']);
Route::get('admin/product-generate-csv', [ProductController::class, 'generateCSV']);

Route::resource('admin/category', CategoryController::class);
Route::get('admin/category-edit/{id}', [CategoryController::class, 'edit']);

Route::resource('admin/store', StoreController::class);
Route::get('admin/store-edit/{id}', [StoreController::class, 'edit']);

Route::resource('admin/orders', OrdersController::class);
Route::get('admin/orders-edit/{id}', [OrdersController::class, 'edit']);

Route::resource('admin/transaction', CheckoutController::class);
Route::get('admin/transaction-edit/{id}', [CheckoutController::class, 'edit']);

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