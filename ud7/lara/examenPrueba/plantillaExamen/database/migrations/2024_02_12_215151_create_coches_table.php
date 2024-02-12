<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCochesTable extends Migration
{
    public function up()
    {
        Schema::create('coches', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coches');
    }
}

