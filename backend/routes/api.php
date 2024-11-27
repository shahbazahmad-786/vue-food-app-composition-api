<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodmenuController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'getUser'])->middleware('auth:sanctum');
Route::get('/foods', [FoodController::class, 'index'])->middleware('auth:sanctum');
Route::post('/store', [FoodController::class, 'store']);

Route::get('/foodmenu', [FoodmenuController::class, 'index']);
Route::post('/foodmenustore', [FoodmenuController::class,'store']);

