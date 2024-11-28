<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodMenuController;
use App\Http\Controllers\AuthController;

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getUser']);

    // Foods
    Route::post('/foods', [FoodController::class, 'create']);
    Route::get('/foods', [FoodController::class, 'index']);

    // Food-Menu
    Route::post('/food-menues', [FoodMenuController::class, 'create']);
    Route::get('/food-menues', [FoodMenuController::class, 'index']);
});