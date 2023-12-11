<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/prueba', function () {
    return response()->json('Hola Mundo', 200);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/prueba-logged', function () {
        return response()->json('Estas Loggeado', 200);
    });
    // Completitud del perfil
    Route::post('completar-perfil', [PerfilController::class, 'completarPerfil']);
    Route::post('/prueba-perfil',function(){
        return response()->json(auth()->user()->perfil(), 200);
    });
    // Edición del perfil
    Route::get('editar-perfil', [PerfilController::class, 'editarPerfil']);
    Route::post('actualizar-perfil', [PerfilController::class, 'actualizarPerfil']);

    Route::middleware('sala')->group(function () {
        Route::get ('sala', [SalaController::class,'getSala']);
        Route::get ('direccion', [SalaController::class,'getDireccion']);
        Route::post('completar-direccion',[SalaController::class, 'setDireccion']);

    });
});