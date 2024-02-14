<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\ClienteController;
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

Route::get('/listaCoches', [CocheController::class, 'mostrar'])->name('listaCoches');
Route::post('/guardar-coche', [CocheController::class, 'guardar'])->name('guardar-coche');

Route::get('/listaCLientes', [CLienteController::class, 'mostrar'])->name('listaClientes');
Route::post('/guardar-cliente', [ClienteController::class, 'guardar'])->name('guardar-cliente');

require __DIR__.'/auth.php';
