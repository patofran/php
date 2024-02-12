<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Coche;

class DatabaseSeeder extends Seeder
{

    public function run(): void{
        self::seedCoches();
        $this->command->info("coches guardados con exito");


    }

    static private function seedCoches(){
        $url = 'https://parcan.es/api/transparencia/vehiculos/?format=json';

        $response = Http::get($url);
        $datos = $response->json();

        foreach ($datos as $vehiculo) {
            $coche = new Coche;
            $coche->marca = $vehiculo['marca'];
            $coche->modelo = $vehiculo['modelo'];
            $coche->fecha = $vehiculo['fecha_acuerdo_adquisicion'];
            $coche->save();
        }
    }
}