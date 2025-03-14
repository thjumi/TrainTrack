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
        Schema::create('rutinas', function (Blueprint $table) {
            $table->id('rutina_id')->nullable();
            $table->foreignId('usuario_id')->reference('id')->on('usuarios')->onDelete('cascade')->nullable();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutinas');
    }
};
