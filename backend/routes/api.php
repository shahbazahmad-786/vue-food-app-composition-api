<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodMenuController;


    Route::get('/fetch', [FoodController::class, 'index']);    // Get all foods
    Route::post('/store', [FoodController::class, 'store']);
    // foodmenu route
    Route::get('/foodmenufetch', [FoodMenuController::class, 'index']);    // Get all foods
    Route::post('/foodmenustore', [FoodMenuController::class, 'store']);// Create a food
   


// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
