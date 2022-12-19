<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/detail/{id}', [ProductController::class, 'show']);
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy']);
Route::put('/product/update/{id}', [ProductController::class, 'update']);
Route::post('/product/create', [ProductController::class, 'store']);
