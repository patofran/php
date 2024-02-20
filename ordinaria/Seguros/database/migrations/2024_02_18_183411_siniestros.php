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
        Schema::create('Siniestros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_poliza')->constrained('Poliza')->onDelete('cascade');
            $table->date('fecha');
            $table->string('comunidad');
            $table->string('provincia');
            $table->string('documento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Siniestros');
    }
};
