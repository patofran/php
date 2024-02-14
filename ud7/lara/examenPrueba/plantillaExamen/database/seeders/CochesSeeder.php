<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Coche;

class CochesSeeder extends Seeder
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

/* 

3. **Agregar un formulario o un enlace para la eliminación:** 
En tu vista donde muestras la lista de coches (`coches.blade.php`), 
agrega un formulario o un enlace que envíe una solicitud DELETE a la ruta que hemos definido para la eliminación. 
 Por ejemplo, podrías tener algo como esto:

```html
@foreach($coches as $coche)
    <li>
        {{ $coche->marca }} - {{ $coche->modelo }} ({{ $coche->fecha }}) 
        <form action="{{ route('eliminar-coche', $coche->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </li>
@endforeach

*/