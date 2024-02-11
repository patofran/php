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
            $table->foreignId('cliente_id')->constrained(
                table: 'cliente', indexName: 'id_factura_cliente'
            );
            $table->foreignId('coche_id')->constrained(
                table: 'coche', indexName: 'id_factura_coche'
            );
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('facturas');
    }
};
