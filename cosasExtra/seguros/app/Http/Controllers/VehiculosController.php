<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', ['vehiculos' => $vehiculos]);
    }
    public function create()
    {
        return view('vehiculos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'idCli' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'matricula' => 'required',
        ]);

        $vehiculos = new Vehiculo();

        $vehiculos->idCli = $request->idCli;
        $vehiculos->marca = $request->marca;
        $vehiculos->modelo = $request->modelo;
        $vehiculos->matricula = $request->matricula;

        $vehiculos->save();
        return redirect()->route('vehiculos.index', $vehiculos);
    }

    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculos.edit', ['vehiculo' => $vehiculo]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idCli' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'matricula' => 'required',
        ]);

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->idCli = $request->idCli;
        $vehiculo->marca = $request->marca;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->matricula = $request->matricula;
        $vehiculo->save();
        return redirect()->route('vehiculos.index', $vehiculo);
    }
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function delete(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index');
    }
}
