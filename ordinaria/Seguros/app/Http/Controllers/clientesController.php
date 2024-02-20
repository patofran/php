<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class clientesController extends Controller{

    //funcion para mostrar los clientes
    public function mostrar(){
        $datos = cliente::all();
        return view('listaclientes', compact('datos'));
    }

    //funcion para guardar
    public function guardar(Request $request){
        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
        ]);
        //guardar datos del el form
        $clientes = new Cliente();

        $clientes->dni = $request->dni;
        $clientes->nombre = $request->nombre;
        $clientes->apellidos = $request->apellidos;
        $clientes->telefono = $request->telefono;

        $clientes->save();
        return redirect()->route('listaClientes', $clientes);
    }

    //funcion para borrar
    public function borrar(cliente $cliente){
        $cliente->delete();
        return redirect()->route('listaClientes');
    }

    //funcion para editar y actualizar
    public function editar(cliente $cliente){
        return view('editarcliente', compact('cliente'));
    }
    
    public function actualizar(Request $request, cliente $cliente){
        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
        ]);
    
        $cliente->update($request->all());
        return redirect()->route('listaClientes')->with('success', 'Cliente actualizado correctamente');
    }
    
}