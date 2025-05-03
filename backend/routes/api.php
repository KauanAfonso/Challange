<?php

use App\Http\Controllers\ExercicioController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\VersiculoController;


Route::post('/login', [LoginController::class, 'login']);
Route::post('/register',[LoginController::class, 'register']);
Route::post('/logout',[LoginController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/versiculo/{id}', [VersiculoController::class, 'obter_versiculo']); //obter versiculo
Route::post('/versiculo', [VersiculoController::class, 'criar_versiculo']); // criar versiculo
Route::post('/exercicio',[ExercicioController::class, 'criar_exercicio'] );
Route::post('/exercicio_user', [ExercicioController::class, 'exercicio_realizado'])->middleware('auth:sanctum');



Route::get('/user', function (Request $request) {
    return Response(["user"=>$request->user()], 200);
})->middleware('auth:sanctum');

