<?php

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

Route::get('/', function () {
    return view('landingpage.home');
});

//routing admin dashboard
Route::get('/administrator', function () {
    return view('admin.home');
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