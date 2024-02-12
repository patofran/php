<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\CocheController;
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
    return view('welcome');})
    ->name('inicio');

Route::get('/dashboard', [APIController::class, 'mostrarDatosAPI'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::get('/dashboard', [CocheController::class, 'mostrar'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/guardar-coche', [CocheController::class, 'guardar'])->name('guardar-coche');

require __DIR__.'/auth.php';
