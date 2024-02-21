<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\poliza;
use App\Models\siniestro;

class siniestrosController extends Controller{
    //funcion para mostrar los siniestros
    public function mostrar(){
        $datos = siniestro::all();
        $polizas = poliza::all();
        return view('listaSiniestros', compact('datos'), compact('polizas'));
    }

    //funcion para guardar
    public function guardar(Request $request){
        $request->validate([
            'id_polizas' => 'required',
            'fecha' => 'required',
            'comunidad' => 'required',
            'provincia' => 'required',
            'documento' => 'required',
        ]);
        //guardar datos del el form
        $siniestro = new siniestro();

        $siniestro->id_polizas = $request->id_polizas;
        $siniestro->fecha = $request->fecha;
        $siniestro->comunidad = $request->comunidad;
        $siniestro->provincia = $request->provincia;
        $siniestro->documento = $request->documento;
        $siniestro->save();

        return redirect()->route('listaSiniestros', $siniestro);
    }

    //funcion para editar y actualizar
    public function editar(siniestro $siniestro){
        return view('editar-siniestros', compact('siniestro'));
    }

    public function actualizar(Request $request, siniestro $siniestro){
        $request->validate([
            'id_polizas' => 'required',
            'fecha' => 'required',
            'comunidad' => 'required',
            'provincia' => 'required',
            'documento' => 'required',
        ]);
    
        $siniestro->update($request->only(['id_polizas', 'fecha', 'comunidad', 'provincia', 'documento']));
        return redirect()->route('listaSiniestros')->with('success', 'siniestro eliminado correctamente');
    }        

    //funcion para eliminar un vehiculo
    public function eliminar(siniestro $siniestro) {
        $siniestro->delete();
        return redirect()->route('listaSiniestro')->with('success', 'siniestro eliminado correctamente');
    }
}
