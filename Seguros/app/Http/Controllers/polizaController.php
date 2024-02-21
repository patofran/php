<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\poliza;
use App\Models\vehiculo;

class polizaController extends Controller{

    //funcion para mostrar los vehiculos
    public function mostrar(){
        $datos = poliza::all();
        $vehiculos = vehiculo::all();
        return view('listaPolizas', compact('datos'), compact('vehiculos'));
    }

    //funcion para guardar
    public function guardar(Request $request){
        $request->validate([
            'id_vehiculo' => 'required',
            'importe' => 'required',
            'fecha_caducidad' => 'required',
        ]);
        //guardar datos del el form
        $poliza = new poliza();

        $poliza->id_vehiculo = $request->id_vehiculo;
        $poliza->importe = $request->importe;
        $poliza->fecha_caducidad = $request->fecha_caducidad;

        $poliza->save();
        return redirect()->route('listaPolizas', $poliza);
    }

    //funcion para editar y actualizar
    public function editar(poliza $poliza){
        return view('editarPolizas', compact('poliza'));
    }

    public function actualizar(Request $request, poliza $poliza){
        $request->validate([
            'importe' => 'required',
            'fecha_caducidad' => 'required',
        ]);
    
        $poliza->update($request->only(['importe', 'fecha_caducidad']));
        return redirect()->route('listaPolizas')->with('success', 'poliza eliminada correctamente');
    }        

    //funcion para eliminar un vehiculo
    public function eliminar(poliza $poliza) {
        $poliza->delete();
        return redirect()->route('listaPolizas')->with('success', 'poliza eliminada correctamente');
    }
}
