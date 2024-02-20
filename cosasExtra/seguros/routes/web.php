<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PolizaController;
use App\Http\Controllers\SiniestrosController;
use App\Http\Controllers\VehiculosController;
use App\Models\Siniestro;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/edit/{id}', [ClientesController::class, 'update'])->name('clientes.update');
Route::get('clientes/{id}', [ClientesController::class, 'show'])->name('clientes.show');
Route::delete('clientes{cliente}', [ClientesController::class, 'delete'])->name('clientes.delete');



Route::get('vehiculos', [VehiculosController::class, 'index'])->name('vehiculos.index');
Route::get('vehiculos/create', [VehiculosController::class, 'create'])->name('vehiculos.create');
Route::post('vehiculos', [VehiculosController::class, 'store'])->name('vehiculos.store');
Route::get('/vehiculos/{id}/edit', [VehiculosController::class, 'edit'])->name('vehiculos.edit');
Route::put('/vehiculos/edit/{id}', [VehiculosController::class, 'update'])->name('vehiculos.update');
Route::get('vehiculos/{id}', [VehiculosController::class, 'show'])->name('vehiculos.show');
Route::delete('vehiculos{cliente}', [VehiculosController::class, 'delete'])->name('vehiculos.delete');


Route::get('polizas', [PolizaController::class, 'index'])->name('polizas.index');
Route::get('polizas/create', [PolizaController::class, 'create'])->name('polizas.create');
Route::post('polizas', [PolizaController::class, 'store'])->name('polizas.store');
Route::get('polizas/{id}', [PolizaController::class, 'show'])->name('polizas.show');
Route::get('/polizas/{id}/edit', [PolizaController::class, 'edit'])->name('polizas.edit');
Route::put('/polizas/edit/{id}', [PolizaController::class, 'update'])->name('polizas.update');


Route::get('siniestros', [SiniestrosController::class, 'index'])->name('siniestros.index');
Route::get('siniestros/create', [SiniestrosController::class, 'create'])->name('siniestros.create');
Route::post('siniestros', [SiniestrosController::class, 'store'])->name('siniestros.store');
Route::get('siniestros/{id}', [SiniestrosController::class, 'show'])->name('siniestros.show');
