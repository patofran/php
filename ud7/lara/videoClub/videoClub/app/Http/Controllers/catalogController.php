<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;

class CatalogController extends Controller{

    public function getIndex(){
        $peliculas = Pelicula::all();
        return view('catalog.index', ['peliculas' => $peliculas]);
    }

    public function getShow($id){
        $pelicula = Pelicula::find($id);
        if (!$pelicula) {
            abort(404); 
        }
        return view('catalog.show', ['infoPelicula' => $pelicula]);
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit(){
        return view('catalog.edit');
    }
}

?>
