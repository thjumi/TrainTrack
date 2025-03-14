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
        Schema::create('ejercicios_rutinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rutina_id')->reference('id')->on('rutinas')->onDelete('cascade')->nullable();
            $table->foreignId('ejercicio_id')->refernce('id')->on('ejercicios')->onDelete('cascade')->nullable();
            $table->integer('repeticiones')->nullable();
            $table->integer('series')->nullable();
            $table->integer('descansos')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios_rutinas');
    }
};

