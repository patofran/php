<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;


use Illuminate\Http\Request;

class catalogController extends Controller
{
 
    public function getIndex(){
        $peliculas = Pelicula::all();
        return view('catalog.index', ['peliculas'=> $peliculas]);
    }
    public function getShow($id){
        $pelicula = Pelicula::find($id);
        if (!$pelicula) {
            abort(404); 
        }
        return view('catalog.show', ['arrayPeliculas' => $pelicula]);
    }
    public function getCreate(){
        return view('catalog.create');
    }
    public function getEdit(){
        return view('catalog.edit');
    }
}
