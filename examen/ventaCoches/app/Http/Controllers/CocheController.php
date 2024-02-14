<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche;

class CocheController extends Controller{


    // Método para guardar un nuevo coche en la base de datos
    public function guardar(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'precio' => 'required|int|max:11',
        ]);

        // Crear un nuevo coche con los datos del formulario
        $coche = new Coche;
            $coche->marca = $request->marca;
            $coche->modelo = $request->modelo;
            $coche->precio = $request->precio;
            $coche->save();

        // Redirigir a una página de éxito o a donde desees después de guardar el coche
        return redirect()->route('dashboard');
    }

    public function mostrar(){
        $datos = Coche::all();
        return view('/listaCoches', compact('datos'));
    }
}