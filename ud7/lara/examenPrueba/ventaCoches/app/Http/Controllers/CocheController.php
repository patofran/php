<?php

// CocheController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche;

class CocheController extends Controller
{
    public function index()
    {
        $coches = coche::all();
        return view('listaCoches', compact('coches'));
    }
}

