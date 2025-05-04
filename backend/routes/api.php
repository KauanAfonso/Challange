<?php

use App\Http\Controllers\AguaController;
use App\Http\Controllers\ExercicioController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\VersiculoController;
use App\Http\Controllers\AnotacoesController;


//ACCOUNT
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register',[LoginController::class, 'register']);
Route::post('/logout',[LoginController::class, 'logout'])->middleware('auth:sanctum');


//VERSICULO
Route::get('/versiculo/{id}', [VersiculoController::class, 'obter_versiculo']); //obter versiculo
Route::post('/versiculo', [VersiculoController::class, 'criar_versiculo']); // criar versiculo (FUNÇÂO PARA POSSIVEL ADMIN)


//EXERCICIOS
Route::post('/exercicio',[ExercicioController::class, 'criar_exercicio'] ); //cria exercicios (FUNÇÂO PARA POSSIVEL ADMIN)
Route::post('/exercicio_user', [ExercicioController::class, 'exercicio_realizado'])->middleware('auth:sanctum'); //cria o exercicio do usuario no dia
Route::get('/exercicio_user', [ExercicioController::class, 'obter_exercicio_dia'])->middleware('auth:sanctum'); //obtem os exercicios do usuario

//ANOTAÇÔES
Route::post('/anotacoes', [AnotacoesController::class, 'criar_anotacao'])->middleware('auth:sanctum'); //cria anotações
Route::get('/anotacoes', [AnotacoesController::class, 'obter_anotacoes'])->middleware('auth:sanctum'); //obtem todas as anotações
Route::delete('/anotacoes/{id}', [AnotacoesController::class, 'excluir_anotacao'])->middleware('auth:sanctum'); //obtem todas as anotações


//AGUA
Route::post('/agua', [AguaController::class, 'registrar_agua'])->middleware('auth:sanctum');
Route::get('/agua', [AguaController::class, 'obter_agua_dia'])->middleware('auth:sanctum');


Route::get('/user', function (Request $request) {
    return Response(["user"=>$request->user()], 200);
})->middleware('auth:sanctum');

