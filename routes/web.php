<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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
    Route::post('/shop', [ProductController::class, 'addCart'])->name('product.addCart');
});

Route::get('/', [DashboardController::class, 'index_home'])->name('index.home');
Route::get('/shop', [ProductController::class, 'indexShop'])->name('product.indexShop');
Route::get('/shop/smartphone', [ProductController::class, 'smartphone']);
Route::get('/shop/laptop', [ProductController::class, 'laptop']);
Route::get('/shop/pc', [ProductController::class, 'pc']);

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

Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('admin/user/profile/{id}', [UserController::class, 'userprofile'])->name('user.profile');
Route::get('admin/user/edit-profile/{id}', [UserController::class, 'editprofile'])->name('user.edit-profile');
Route::put('admin/user/update-profile/{id}', [UserController::class, 'updateprofile'])->name('user.update-profile');
Route::get('admin/user/change-password/{id}', [UserController::class, 'changepassword'])->name('user.change-password');

Route::get('/edit-profile/{id}', [UserController::class, 'edit_profile'])->name('edit-profile');
Route::put('/update-profile/{id}', [UserController::class, 'update_profile'])->name('update-profile');

Route::get('/show-product/{id}', [ProductController::class, 'detailShop'])->name('detail.shop');
Route::get('/about', [DashboardController::class, 'about']);
Route::get('/cart', [DashboardController::class, 'myCart']);
Route::get('/orders', [DashboardController::class, 'myOrders'])->name('myorders');
Route::get('/checkout/{id}', [OrdersController::class, 'checkout'])->name('orders.checkout');
Route::post('checkout/{id}', [OrdersController::class, 'check_ongkir']);
Route::post('/checkout/payment/{id}', [OrdersController::class, 'addCheckout'])->name('orders.addCheckout');
Route::get('/checkout/payment/{id}', [OrdersController::class, 'payment']);
Route::post('/checkout/payment/{id}', [OrdersController::class, 'payment_post'])->name('payment.post');
Route::get('checkout/cities/{province_id}', [OrdersController::class, 'getCities']);
Route::delete('/cart/destroy/{id}', [OrdersController::class, 'destroyCart'])->name('orders.destroyCart');
Route::delete('/orders/destroy/{id}', [OrdersController::class, 'destroyOrders'])->name('orders.destroyOrders');
Route::get('/contact', [DashboardController::class, 'contact']);
Route::get('/registered', [DashboardController::class, 'registered']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/access-denied', function () {
    return view('admin.access_denied');
});

