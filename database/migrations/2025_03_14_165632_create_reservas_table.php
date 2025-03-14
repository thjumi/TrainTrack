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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('reserva_id')->nullable();
            $table->foreignId('usuario_id')->reference('id')->on('usuarios')->onDelete('cascade')->nullable();
            $table->foreignId('clase_id')->refernece('id')->on('clases')->onDelete('cascade')->nullable();
            $table->date('fecha_reserva')->nullable();
            $table->boolean('estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
