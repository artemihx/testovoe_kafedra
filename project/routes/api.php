<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('products', [ProductController::class, 'index']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('cart',[ProductController::class, 'getCart']);
    Route::post('cart/{product}', [ProductController::class, 'addToCart']);
    Route::delete('cart/{cart}', [ProductController::class, 'deleteFromCart']);
    Route::post('order', [ProductController::class, 'makeOrder']);
    Route::get('order', [ProductController::class, 'getOrders']);
    Route::get('logout', [AuthController::class, 'logout']);

    Route::group(['middleware' => 'role:admin'], function (){
       Route::post('product', [ProductController::class, 'addProduct']);
       Route::delete('product/{product}',[ProductController::class, 'deleteProduct']);
       Route::patch('product/{product}', [ProductController::class, 'updateProduct']);
    });
});
