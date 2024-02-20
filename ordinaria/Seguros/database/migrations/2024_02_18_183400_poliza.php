<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Poliza', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vehiculo')->constrained('Vehiculos')->onDelete('cascade');
            $table->integer('importe');
            $table->integer('fecha_caducidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Poliza');
    }
};
