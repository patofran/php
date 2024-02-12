<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\CocheController;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/listaCoches', [CocheController::class, 'index']);
Route::get('/listaClientes', [ClienteController::class, 'index']);
