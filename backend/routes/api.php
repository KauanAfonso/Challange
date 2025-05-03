<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;



Route::post('/login', [LoginController::class, 'login']);
Route::post('/register',[LoginController::class, 'register']);
Route::post('/logout',[LoginController::class, 'logout'])->middleware('auth:sanctum');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

