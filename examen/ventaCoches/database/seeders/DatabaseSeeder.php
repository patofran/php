<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\coche;
use App\Models\cliente;
use App\Models\factura;

class DatabaseSeeder extends Seeder
{
    public function run(): void{
        self::meterCoche1();
        self::meterCoche2();
        $this->command->info("coches guardados con exito");
        self::meterCliente1();
        self::meterCliente2();
        $this->command->info("clientes guardados con exito");
        self::meterFactura1();
        self::meterFactura2();
        $this->command->info("facturas guardadas con exito");
    }

    static private function meterCoche1(){
        $c = new coche;
        $c->marca = "Citroen";
        $c->modelo = "C3";
        $c->precio = 15000;
        $c->save();
    }

    static private function meterCoche2(){
        $c = new coche;
        $c->marca = "Ford";
        $c->modelo = "Mondeo";
        $c->precio = 40000;
        $c->save();
    }

    static private function meterCliente1(){
        $c = new cliente;
        $c->nombre = "Francisco";
        $c->apellido = "Verdaguer";
        $c->telefono = 651321511;
        $c->save();
    }

    static private function meterCliente2(){
        $c = new cliente;
        $c->nombre = "Antonio";
        $c->apellido = "Ayala";
        $c->telefono = 664778121;
        $c->save();
    }

    static private function meterFactura1(){
        $f = new factura;
        $f->cliente_id = 1;
        $f->coche_id = 1;
        $f->fecha = "2023-02-14";
        $f->save();
    }

    static private function meterFactura2(){
        $f = new factura;
        $f->cliente_id = 1;
        $f->coche_id = 2;
        $f->fecha = "2023-04-02";
        $f->save();
    }
}
