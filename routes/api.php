<?php

use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthAgenteController;
use App\Http\Controllers\AuthClienteController;
use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// //login y registrar ADMIN
// Route::post('/register', [AuthAdminController::class, 'register']);
// Route::post('/login', [AuthAdminController::class, 'login']);

// //login y registrar cliente 
// Route::post('/register', [ClienteController::class, 'register']);
// Route::post('/login', [ClienteController::class, 'login']);
// //Route::get('/todos', [ClienteController::class, 'index']);

// // //login y registrar agente
// // // Route::post('/register', [AuthAgenteController::class, 'register']);
// // Route::post('/login', [AuthAgenteController::class, 'login']);

Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthAdminController::class, 'login']);
});

Route::prefix('agente')->group(function () {
    Route::post('/login', [AuthAgenteController::class, 'login']);
});

Route::prefix('cliente')->group(function () {
    Route::post('/login', [AuthClienteController::class, 'login']);
});