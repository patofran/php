<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientesController;

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
