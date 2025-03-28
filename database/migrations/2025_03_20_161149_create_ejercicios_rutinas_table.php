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
            $table->foreignId('rutina_id')->constrained('rutinas');
            $table->foreignId('ejercicio_id')->constrained('ejercicios');
            $table->integer('repeticiones');
            $table->integer('series');
            $table->integer('descansos');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('ejercicios_rutinas');
    }
      
};
