<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('clientes', function (Blueprint $clientes) {
            $clientes->id('id');
            $clientes->string('dni');
            $clientes->string('nombre');
            $clientes->string('apellidos');
            $clientes->integer('telefono');
            $clientes->timestamps();
        });

        Schema::create('vehiculos', function (Blueprint $vehiculos) {
            $vehiculos->id();
            $vehiculos->unsignedBigInteger('id');
            $vehiculos->foreign('id')->references('id')->on('clientes')->onDelete('cascade');
            $vehiculos->string('marca');
            $vehiculos->string('modelo');
            $vehiculos->string('matricula');
            $vehiculos->timestamps();
        });

        Schema::create('polizas', function (Blueprint $polizas) {
            $polizas->id();
            $polizas->unsignedBigInteger('id');
            $polizas->foreign('id')->references('id')->on('vehiculos')->onDelete('cascade');
            $polizas->integer('importe');
            $polizas->date('fecha_cad');
            $polizas->timestamps();
        });

        Schema::create('siniestros', function (Blueprint $siniestros) {
            $siniestros->id();
            $siniestros->unsignedBigInteger('id');
            $siniestros->foreign('id')->references('id')->on('polizas')->onDelete('cascade');
            $siniestros->string('comunidad');
            $siniestros->string('provincia');
            $siniestros->string('documento');
            $siniestros->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
