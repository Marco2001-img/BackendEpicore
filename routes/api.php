<?php

use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthAgenteController;
use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login y registrar ADMIN
Route::post('/registerAdmin', [AuthAdminController::class, 'register']);
Route::post('/loginAdmin', [AuthAdminController::class, 'login']);

//login y registrar cliente 
Route::post('/clienteregistrar', [ClienteController::class, 'register']);
Route::post('/Clientelogin', [ClienteController::class, 'login']);
//Route::get('/todos', [ClienteController::class, 'index']);

//login y registrar agente
Route::post('/registerAdmin', [AuthAdminController::class, 'register']);
Route::post('/loginAdmin', [AuthAdminController::class, 'login']);
