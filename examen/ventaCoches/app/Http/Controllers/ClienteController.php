<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class ClienteController extends Controller{


    // Método para guardar un nuevo cliente en la base de datos
    public function guardar(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|int|max:9',
        ]);

        // Crear un nuevo cliente con los datos del formulario
        $cliente = new cliente;
            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->telefono = $request->telefono;
            $cliente->save();

        // Redirigir a una página de éxito o a donde desees después de guardar el cliente
        return redirect()->route('dashboard');
    }

    public function mostrar(){
        $datos = cliente::all();
        return view('/listaclientes', compact('datos'));
    }
}