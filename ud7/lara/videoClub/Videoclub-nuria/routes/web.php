<?php

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


use App\Http\Controllers\catalogController;
use App\Http\Controllers\homeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/catalog', [catalogController::class, 'getIndex']);
    Route::get('/catalog/show/{id}', [catalogController::class, 'getShow']);
    Route::get('/catalog/create', [catalogController::class, 'getCreate']);
    Route::get('/catalog/edit', [catalogController::class, 'getEdit']);
});