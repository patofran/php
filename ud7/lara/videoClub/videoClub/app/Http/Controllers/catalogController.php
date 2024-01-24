<?php

namespace App\Http\Controllers;

class CatalogController extends Controller{

    public function getIndex(){
        require_once 'array_peliculas.php';
        return view('catalog.index', ['arrayPeliculas', $arrayPeliculas]);
    }

    public function getShow($id){
        return view('catalog.show', array('id'=>$id));
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit(){
        return view('catalog.edit');
    }
}

?>
