<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelicula;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        self::seedCatalog();
        $this->command->info("tabla iniciada con exito");
        self::crearUsuario();
        $this->command->info("usuario creado con exito");

    }

    static private function seedCatalog(){
        require_once 'array_peliculas.php';
        foreach($arrayPeliculas as $pelicula) {
            $p = new Pelicula;
            $p->title = $pelicula["title"];
            $p->year = $pelicula["year"];
            $p->director = $pelicula["director"];
            $p->poster = $pelicula["poster"];
            $p->rented = $pelicula["rented"];
            $p->synopsis = $pelicula["synopsis"];
            $p->save();
        }
    }

    static private function crearUsuario(){
        $usuario = new User;
        $usuario->name = "manolo";
        $usuario->email = "manolo@gmail.com";
        $usuario->password = "1234";
        $usuario->save();
    }
}
