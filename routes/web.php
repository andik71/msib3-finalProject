<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [DashboardController::class, 'index' ]);


});

Route::middleware(['role:admin-manager-staff'])->group(function () {
    Route::resource('admin/product', ProductController::class);
    Route::get('admin/product-generate-pdf', [ProductController::class, 'generatePDF']);
    Route::get('admin/product-generate-csv', [ProductController::class, 'generateCSV']);

    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/store', StoreController::class);

});

Route::middleware(['role:admin-manager'])->group(function () {
    Route::get('admin/product-edit/{id}', [ProductController::class,'edit']);
    Route::delete('admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    
    
    Route::get('admin/category-edit/{id}', [CategoryController::class, 'edit']);
    Route::delete('admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    Route::get('admin/store-edit/{id}', [StoreController::class, 'edit']);
    Route::delete('admin/store/destroy/{id}', [StoreController::class, 'destroy'])->name('store.destroy');

    Route::resource('admin/orders', OrdersController::class);
    Route::get('admin/orders-edit/{id}', [OrdersController::class, 'edit']);
    Route::get('admin/orders-generate-pdf', [OrdersController::class, 'generatePDF']);
    Route::get('admin/orders-generate-csv', [OrdersController::class, 'generateCSV']);
    Route::delete('admin/orders/destroy/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');
    
    Route::resource('admin/transaction', CheckoutController::class);
    Route::get('admin/transaction-edit/{id}', [CheckoutController::class, 'edit']);
    Route::get('admin/transaction-generate-pdf', [CheckoutController::class, 'generatePDF']);
    Route::get('admin/transaction-generate-csv', [CheckoutController::class, 'generateCSV']);
    Route::delete('admin/transaction/destroy/{id}', [CheckoutController::class, 'destroy'])->name('checkout.destroy');
});

Route::middleware(['role:admin'])->group(function () {

    Route::resource('admin/user', UserController::class);
    Route::get('admin/user-edit/{id}', [UserController::class, 'edit']);
    Route::delete('admin/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    
});


Route::get('admin/user/profile/{id}', [UserController::class, 'userprofile'])->name('user.profile');
Route::get('admin/user/edit-profile/{id}', [UserController::class, 'editprofile'])->name('user.edit-profile');
Route::put('admin/user/update-profile/{id}', [UserController::class, 'updateprofile'])->name('user.update-profile');
Route::get('admin/user/change-password/{id}', [UserController::class, 'changepassword'])->name('user.change-password');

// Route::get('/admin/user/profile', function () {
//     return view('admin.user.profile');
// });


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


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registered', function () {
    return view('landingpage.registered');
});

Route::get('/access-denied', function () {
    return view('admin.access_denied');
});


