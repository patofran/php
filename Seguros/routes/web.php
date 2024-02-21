<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\vehiculosController;
use App\Http\Controllers\polizaController;
use App\Http\Controllers\siniestrosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//ruta clientes
Route::get('/listaCLientes', [clientesController::class, 'mostrar'])->name('listaClientes');
Route::post('/guardarCliente', [clientesController::class, 'guardar'])->name('guardar-cliente');
Route::delete('/borrarCliente{cliente}', [clientesController::class, 'borrar'])->name('borrar-cliente');
Route::get('/editarCliente/{cliente}', [clientesController::class, 'editar'])->name('editar-cliente');
Route::patch('/actualizarCliente/{cliente}', [clientesController::class, 'actualizar'])->name('actualizar-cliente');

//rutas vehiculos
Route::get('/listaVehiculos', [vehiculosController::class, 'mostrar'])->name('listaVehiculos');
Route::post('/guardarVehiculo', [vehiculosController::class, 'guardar'])->name('guardar-vehiculo');
Route::get('/editarVehiculo/{vehiculo}', [vehiculosController::class, 'editar'])->name('editar-vehiculo');
Route::patch('/actualizarVehiculo/{vehiculo}', [vehiculosController::class, 'actualizar'])->name('actualizar-vehiculo');
Route::delete('/eliminarVehiculo/{vehiculo}', [vehiculosController::class, 'eliminar'])->name('eliminar-vehiculo');

//rutas de poliza
Route::get('/listaPolizas', [polizaController::class, 'mostrar'])->name('listaPolizas');
Route::post('/guardarPoliza', [polizaController::class, 'guardar'])->name('guardar-poliza');
Route::get('/editarPoliza/{poliza}', [polizaController::class, 'editar'])->name('editar-poliza');
Route::patch('/actualizarPoliza/{poliza}', [polizaController::class, 'actualizar'])->name('actualizar-poliza');
Route::delete('/eliminarPoliza/{poliza}', [polizaController::class, 'eliminar'])->name('eliminar-poliza');

//rutas de siniestros
Route::get('/listaSiniestros', [siniestrosController::class, 'mostrar'])->name('listaSiniestros');
Route::post('/guardarSiniestro', [siniestrosController::class, 'guardar'])->name('guardar-siniestro');
Route::get('/editarSiniestros/{siniestro}', [siniestrosController::class, 'editar'])->name('editar-siniestros');
Route::patch('/actualizarSiniestro/{siniestro}', [siniestrosController::class, 'actualizar'])->name('actualizar-siniestro');
Route::delete('/eliminarSiniestro/{siniestro}', [siniestrosController::class, 'eliminar'])->name('eliminar-siniestro');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
