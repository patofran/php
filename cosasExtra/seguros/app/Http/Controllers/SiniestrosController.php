<?php

namespace App\Http\Controllers;

use App\Models\Siniestro;
use Illuminate\Http\Request;

class SiniestrosController extends Controller
{
    public function index()
    {
        $siniestros = Siniestro::all();
        return view('siniestros.index', ['siniestros' => $siniestros]);
    }
    public function create()
    {
        return view('siniestros.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'idPol' => 'required',
            'comunidad' => 'required',
            'provincia' => 'required',
            'documento' => 'required',
        ]);
        //guardar datos del el form
        $siniestros = new Siniestro();

        $siniestros->idPol = $request->idPol;
        $siniestros->comunidad = $request->comunidad;
        $siniestros->provincia = $request->provincia;
        $siniestros->documento = $request->documento;

        $siniestros->save();
        return redirect()->route('siniestros.index', $siniestros);
    }
}
