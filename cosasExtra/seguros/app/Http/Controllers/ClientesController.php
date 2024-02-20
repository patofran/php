<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }
    public function create()
    {
        return view('clientes.create');
    }
    public function store(Request $request)
    {
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
        return redirect()->route('clientes.index', $clientes);
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->dni = $request->input('dni');
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->telefono = $request->input('telefono');
        $cliente->save();
        return redirect()->route('clientes.index', $cliente);
    }
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.show', compact('cliente'));
    }

    public function delete(Cliente $cliente)
    {

        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
