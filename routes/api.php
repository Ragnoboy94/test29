<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CarModelController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class,'login']);

Route::get('/brands', [BrandController::class,'index']);
Route::get('/models', [CarModelController::class,'index']);

Route::apiResource('cars', CarController::class);
