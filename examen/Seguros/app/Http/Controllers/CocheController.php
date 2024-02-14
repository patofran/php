<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehiculo;

class CocheController extends Controller{


    // Método para guardar un nuevo coche en la base de datos
    public function guardar(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'id_cliente' => 'required|int',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'matricula' => 'required|string|max:10',
        ]);

        // Crear un nuevo coche con los datos del formulario
        $vehiculo = new vehiculo;
            $vehiculo->id_cliente = $request->id_cliente;
            $vehiculo->marca = $request->marca;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->matricula = $request->matricula;
            $vehiculo->save();

        // Redirigir a una página de éxito o a donde desees después de guardar el coche
        return redirect()->route('dashboard');
    }

    public function mostrar(){
        $datos = vehiculo::all();
        return view('/listaCoches', compact('datos'));
    }
}