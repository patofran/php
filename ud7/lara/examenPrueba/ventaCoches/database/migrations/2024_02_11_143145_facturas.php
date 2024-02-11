<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('facturas', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_coches');
            $table->foreignId('id_coches')->references('id')->on('coches');

            $table->unsignedBigInteger('id_clientes');
            $table->foreignId('id_clientes')->references('id')->on('clientes');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('clientes');
    }
};
