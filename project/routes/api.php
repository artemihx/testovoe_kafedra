<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('products', [ProductController::class, 'index']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('cart',[ProductController::class, 'getCart']);
    Route::post('cart/{product}', [ProductController::class, 'addToCart']);
    Route::delete('cart/{cart}', [ProductController::class, 'deleteFromCart']);
});
