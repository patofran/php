<?php

namespace App\Http\Controllers;

use App\Models\Poliza;
use Illuminate\Http\Request;

class PolizaController extends Controller
{
    public function index()
    {
        $polizas = Poliza::all();
        return view('polizas.index', ['polizas' => $polizas]);
    }
    public function create()
    {
        return view('polizas.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'idVehi' => 'required',
            'importe' => 'required',
            'fecha_cad' => 'required',
        ]);
        //guardar datos del el form
        $polizas = new Poliza();

        $polizas->id = $request->id;
        $polizas->importe = $request->importe;
        $polizas->fecha_cad = $request->fecha_cad;

        $polizas->save();
        return redirect()->route('polizas.index', $polizas);
    }
    public function edit($id)
    {
        $poliza = Poliza::find($id);
        return view('polizas.edit', ['poliza' => $poliza]);
    }

    public function update(Request $request, Poliza $poliza)
    {
        $request->validate([
            'id' => 'required',
            'importe' => 'required',
            'fecha_cad' => 'required',
        ]);
        //guardar datos del el form
        $poliza = new Poliza();

        $poliza->id = $request->id;
        $poliza->importe = $request->importe;
        $poliza->fecha_cad = $request->fecha_cad;
        $poliza->update();
        return redirect()->route('polizas.index', $poliza);
    }
}
