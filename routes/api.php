<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agente\AgenteController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthAgenteController;
use App\Http\Controllers\AuthClienteController;
use App\Http\Controllers\Departamento\DepartamentoController;
use App\Http\Controllers\Admin\Grupo\GrupoController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\Admin\Sede\SedeController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Ticket\TicketController;
use App\Http\Controllers\TipoTicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthAdminController::class, 'login']);


    Route::get('/', [AdminController::class, 'index']);
    Route::post('/', [AdminController::class, 'store']);
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'destroy']);

});

Route::prefix('agente')->group(function () {
    Route::post('/login', [AuthAgenteController::class, 'login']);

        Route::get('/', [AgenteController::class, 'index']);
        Route::post('/', [AgenteController::class, 'store']);
        Route::get('/{id}', [AgenteController::class, 'show']);
        Route::put('/{id}', [AgenteController::class, 'update']);
        Route::delete('/{id}', [AgenteController::class, 'destroy']);

});

Route::prefix('cliente')->group(function () {
    Route::post('/login', [AuthClienteController::class, 'login']);


        Route::get('/', [ClienteController::class, 'index']);
        Route::post('/', [ClienteController::class, 'store']);
        Route::get('/{id}', [ClienteController::class, 'show']);
        Route::put('/{id}', [ClienteController::class, 'update']);
        Route::delete('/{id}', [ClienteController::class, 'destroy']);

});

Route::prefix('grupos')->group(function () {

        Route::get('/', [GrupoController::class, 'index']);
        Route::post('/', [GrupoController::class, 'store']);
        Route::get('/{id}', [GrupoController::class, 'show']);
        Route::put('/{id}', [GrupoController::class, 'update']);
        Route::delete('/{id}', [GrupoController::class, 'destroy']);

});

Route::prefix('sedes')->group(function () {

        Route::get('/', [SedeController::class, 'index']);
        Route::post('/', [SedeController::class, 'store']);
        Route::get('/{id}', [SedeController::class, 'show']);
        Route::put('/{id}', [SedeController::class, 'update']);
        Route::delete('/{id}', [SedeController::class, 'destroy']);

});

Route::prefix('departamentos')->group(function () {

        Route::get('/', [DepartamentoController::class, 'index']);
        Route::post('/', [DepartamentoController::class, 'store']);
        Route::get('/{id}', [DepartamentoController::class, 'show']);
        Route::put('/{id}', [DepartamentoController::class, 'update']);
        Route::delete('/{id}', [DepartamentoController::class, 'destroy']);

});

Route::prefix('tickets')->group(function () {

        Route::get('/', [TicketController::class, 'index']);
        Route::post('/', [TicketController::class, 'store']);
        Route::get('/{id}', [TicketController::class, 'show']);
        Route::put('/{id}', [TicketController::class, 'update']);
        Route::delete('/{id}', [TicketController::class, 'destroy']);

});
/**********************************************************/


// Route::get('/TodosMensajes', [MensajeController::class, 'index']); 
// Route::post('/crearMensajes', [MensajeController::class, 'store']);
// Route::put('/modificarMensajes/{id}', [MensajeController::class, 'update']);
// Route::get('/buscarMensaje/{id}', [MensajeController::class, 'show']);
// Route::delete('/eliminarMensajes/{id}', [MensajeController::class, 'destroy']);


// Route::get('/TodosTipoTicket', [TipoTicketController::class, 'index']); 
// Route::post('/crearTipoTicket', [TipoTicketController::class, 'store']);
// Route::put('/modificarTipoTicket/{id}', [TipoTicketController::class, 'update']);
// Route::get('/buscarTipoTicket/{id}', [TipoTicketController::class, 'show']);
// Route::delete('/eliminarTipoTicket/{id}', [TipoTicketController::class, 'destroy']);

