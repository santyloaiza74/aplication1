<?php

use App\Http\Controllers\Api\MovementController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/productos', ProductController::class);
Route::apiResource('/movimientos', MovementController::class);
