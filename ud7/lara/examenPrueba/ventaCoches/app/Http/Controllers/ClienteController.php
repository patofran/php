<?php

// ClienteController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = cliente::all();
        return view('listaClientes', compact('clientes'));
    }
}

