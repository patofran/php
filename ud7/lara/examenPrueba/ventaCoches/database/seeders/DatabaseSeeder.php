<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\coche;

class DatabaseSeeder extends Seeder
{
    public function run(): void{
        self::meterCoche();
        $this->command->info("coche guardado con exito");
    }

    static private function meterCoche(){
        $c = new coche;
        $c->marca = "Toyota";
        $c->modelo = "Corolla";
        $c->precio = 20000;
        $c->save();
    }
}
