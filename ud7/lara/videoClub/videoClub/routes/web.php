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

use App\Http\Controllers\CatalogController;

use App\Http\Controllers\HomeController;

Route::get('/', [catalogController::class, 'getIndex']);

Route::get('/catalog', [catalogController::class, 'getIndex']);

Route::get('/catalog/show/{id}', [catalogController::class, 'getShow']);

Route::get('/catalog/create', [catalogController::class, 'getCreate']);

Route::get('/catalog/edit', [catalogController::class, 'getEdit']);

