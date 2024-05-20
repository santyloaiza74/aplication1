<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);


Route::resource('/products', ProductController::class);
Route::resource('/movements', MovementController::class);
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
