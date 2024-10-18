<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

// Define your API route
Route::get('/food', [FoodController::class, 'index']);
