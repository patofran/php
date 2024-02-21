<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\vehiculo;

class vehiculosController extends Controller{

        //funcion para mostrar los vehiculos
        public function mostrar(){
            $datos = vehiculo::all();
            $clientes = cliente::all();
            return view('listaVehiculos', compact('datos'), compact('clientes'));
        }
    
        //funcion para guardar
        public function guardar(Request $request){
            $request->validate([
                'id_cliente' => 'required',
                'marca' => 'required',
                'modelo' => 'required',
                'matricula' => 'required',
            ]);
            //guardar datos del el form
            $vehiculo = new vehiculo();
    
            $vehiculo->id_cliente = $request->id_cliente;
            $vehiculo->marca = $request->marca;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->matricula = $request->matricula;
    
            $vehiculo->save();
            return redirect()->route('listaVehiculos', $vehiculo);
        }

        //funcion para editar y actualizar
        public function editar(vehiculo $vehiculo){
            return view('editarVehiculos', compact('vehiculo'));
        }
    
        public function actualizar(Request $request, vehiculo $vehiculo){
            $request->validate([
                'marca' => 'required',
                'modelo' => 'required',
                'matricula' => 'required',
            ]);
        
            $vehiculo->update($request->only(['marca', 'modelo', 'matricula']));
            return redirect()->route('listaVehiculos')->with('success', 'Vehículo actualizado correctamente');
        }        

        //funcion para eliminar un vehiculo
        public function eliminar(vehiculo $vehiculo) {
            $vehiculo->delete();
            return redirect()->route('listaVehiculos')->with('success', 'Vehículo eliminado correctamente');
        }
        
}
