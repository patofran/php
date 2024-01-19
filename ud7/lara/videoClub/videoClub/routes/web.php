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

Route::get('/', function () {
    return view('home');
});


Route::get('/login', function(){
    return view('aunth.login');
});

Route::get('/catalog', function () {
    return view('catalog.index');
});

Route::get('/catalog/show/{id}', function () {
    return view('catalog.show', array('id'=>$id));
});

Route::get('/catalog/create', function () {
    return view('catalog.create');
});

Route::get('/catalog/edit/{id}', function () {
    return view('catalog.edit');
});
