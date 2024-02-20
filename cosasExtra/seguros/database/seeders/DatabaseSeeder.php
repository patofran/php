<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Poliza;
use App\Models\Siniestro;
use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedCliente();
        self::seedVehiculo();
        self::seedPoliza();
    }

    public function seedCliente()
    {
        $clientes = new Cliente();
        $clientes->id = '1';
        $clientes->dni = '03823677J';
        $clientes->nombre = 'Pepe';
        $clientes->apellidos = 'Garcia';
        $clientes->telefono = '651321511';
        $clientes->save();

        $clientes2 = new Cliente;
        $clientes2->id = '2';
        $clientes2->dni = '89264788L';
        $clientes2->nombre = 'Ana';
        $clientes2->apellidos = 'Lopez';
        $clientes2->telefono = '664232323';
        $clientes2->save();
    }
    public function seedVehiculo()
    {
        $vehiculos = new Vehiculo();
        $vehiculos->id = '1';
        $vehiculos->idCli = '1';
        $vehiculos->marca = 'Opel';
        $vehiculos->modelo = 'R1';
        $vehiculos->matricula = '8976G';
        $vehiculos->save();

        $vehiculos2 = new Vehiculo();
        $vehiculos2->id = '2';
        $vehiculos2->idCli = '2';
        $vehiculos2->marca = 'Ford';
        $vehiculos2->modelo = 'Fiesta';
        $vehiculos2->matricula = '3452K';
        $vehiculos2->save();
    }

    public function seedPoliza()
    {
        $polizas = new Poliza();
        $polizas->id = '1';
        $polizas->idVehi = '1';
        $polizas->importe = '289';
        $polizas->fecha_cad = '2022-03-21';
        $polizas->save();

        $polizas2 = new Poliza();
        $polizas2->id = '2';
        $polizas2->idVehi = '2';
        $polizas2->importe = '499';
        $polizas2->fecha_cad = '2021-05-19';
        $polizas2->save();
    }

    public function seedSiniestro()
    {
        $siniestros = new Siniestro();
        $siniestros->id = '1';
        $siniestros->idPol = '1';
        $siniestros->comunidad = 'Valencia';
        $siniestros->provincia = 'Valencia';
        $siniestros->documento = 'Seguro';
        $siniestros->save();
    }
}
