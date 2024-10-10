<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenteController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthAgenteController;
use App\Http\Controllers\AuthClienteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TipoTicketController;
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

/**********************************************************/
Route::get('/TodosAdmin', [AdminController::class, 'index']); 
Route::post('/crearAdmin', [AdminController::class, 'store']);
Route::put('/modificarAdmin/{id}', [AdminController::class, 'update']);
Route::get('/buscarAdmin/{id}', [AdminController::class, 'show']);
Route::delete('/eliminarAdmin/{id}', [AdminController::class, 'destroy']);

Route::get('/TodosAgentes', [AgenteController::class, 'index']); 
Route::post('/crearAgentes', [AgenteController::class, 'store']);
Route::put('/modificarAgente/{id}', [AgenteController::class, 'update']);
Route::get('/buscarAgente/{id}', [AgenteController::class, 'show']);
Route::delete('/eliminarAgente/{id}', [AgenteController::class, 'destroy']);

Route::get('/TodosClientes', [ClientesController::class, 'index']); 
Route::post('/crearCliente', [ClientesController::class, 'store']);
Route::put('/modificarCliente/{id}', [ClientesController::class, 'update']);
Route::get('/buscarCliente/{id}', [ClientesController::class, 'show']);
Route::delete('/eliminarCliente/{id}', [ClientesController::class, 'destroy']);

Route::get('/TodosDepartamentos', [DepartamentoController::class, 'index']); 
Route::post('/crearDepartamento', [DepartamentoController::class, 'store']);
Route::put('/modificarDepartamentos/{id}', [DepartamentoController::class, 'update']);
Route::get('/buscarDepartamentos/{id}', [DepartamentoController::class, 'show']);
Route::delete('/eliminarDepartamentos/{id}', [DepartamentoController::class, 'destroy']);

Route::get('/TodosGrupos', [GrupoController::class, 'index']); 
Route::post('/crearGrupos', [GrupoController::class, 'store']);
Route::put('/modificarGrupos/{id}', [GrupoController::class, 'update']);
Route::get('/buscarGrupos/{id}', [GrupoController::class, 'show']);
Route::delete('/eliminarGrupos/{id}', [GrupoController::class, 'destroy']);

Route::get('/TodosMensajes', [MensajeController::class, 'index']); 
Route::post('/crearMensajes', [MensajeController::class, 'store']);
Route::put('/modificarMensajes/{id}', [MensajeController::class, 'update']);
Route::get('/buscarMensaje/{id}', [MensajeController::class, 'show']);
Route::delete('/eliminarMensajes/{id}', [MensajeController::class, 'destroy']);

Route::get('/TodosSedes', [SedeController::class, 'index']); 
Route::post('/crearSedes', [SedeController::class, 'store']);
Route::put('/modificarSedes/{id}', [SedeController::class, 'update']);
Route::get('/buscarSedes/{id}', [SedeController::class, 'show']);
Route::delete('/eliminarSedes/{id}', [SedeController::class, 'destroy']);

Route::get('/TodosTicket', [TicketController::class, 'index']); 
Route::post('/crearTickets', [TicketController::class, 'store']);
Route::put('/modificarTickets/{id}', [TicketController::class, 'update']);
Route::get('/buscarTickets/{id}', [TicketController::class, 'show']);
Route::delete('/eliminarTickets/{id}', [TicketController::class, 'destroy']);

Route::get('/TodosTipoTicket', [TipoTicketController::class, 'index']); 
Route::post('/crearTipoTicket', [TipoTicketController::class, 'store']);
Route::put('/modificarTipoTicket/{id}', [TipoTicketController::class, 'update']);
Route::get('/buscarTipoTicket/{id}', [TipoTicketController::class, 'show']);
Route::delete('/eliminarTipoTicket/{id}', [TipoTicketController::class, 'destroy']);

