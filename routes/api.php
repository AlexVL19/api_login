<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    /*Rutas públicas, algunas que fueron protegidas se pasaron acá para hacer
    pruebas pertinentes de API*/ 
    
Route::post('/register', [AuthController::class, 'registrar']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'show']);

Route::post('/users', [UserController::class, 'store']);

Route::put('/users/{id}', [UserController::class, 'update']);

Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::post('/logout', [AuthController::class, 'logout']);


    //Rutas protegidas por Sanctum, están en público debido a que se encuentra en pruebas

Route::group(['middleware' => ['auth:sanctum']], function () {

});
