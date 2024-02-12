<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\coche;
use App\Models\cliente;

class DatabaseSeeder extends Seeder
{
    public function run(): void{
        self::meterCoche();
        $this->command->info("coche guardado con exito");
        self::meterCliente();
        $this->command->info("cliente guardado con exito");
    }

    static private function meterCoche(){
        $c = new coche;
        $c->marca = "Toyota";
        $c->modelo = "Corolla";
        $c->precio = 20000;
        $c->save();
    }

    static private function meterCliente(){
        $c = new cliente;
        $c->nombre = "Francisco";
        $c->apellido = "Bolos";
        $c->telefono = 1234;
        $c->save();
    }
}
