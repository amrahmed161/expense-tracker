<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ExpenseController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
     Route::post('/logout', [AuthController::class, 'logout']);

     Route::get('/categories', [CategoryController::class, 'index']);

     Route::apiResource('/expenses', ExpenseController::class);
});
