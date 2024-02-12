<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function mostrarDatosAPI()
    {
        // URL de la API a la que vamos a hacer la solicitud
        $url = 'https://parcan.es/api/transparencia/vehiculos/?format=json';

        try {
            // Realizamos una solicitud GET a la URL
            $response = Http::get($url);

            // Verificamos si la respuesta es exitosa
            if ($response->successful()) {
                // Si la solicitud fue exitosa, obtenemos los datos en formato JSON
                $datos = $response->json();

                // Retornamos una vista con los datos obtenidos de la API
                return view('datosAPI', ['datos' => $datos]);
            } else {
                // En caso de que la solicitud no sea exitosa, manejamos el error adecuadamente
                return response()->json(['error' => 'La solicitud a la API falló'], $response->status());
            }
        } catch (\Exception $e) {
            // Manejamos cualquier excepción que ocurra durante la solicitud
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}


