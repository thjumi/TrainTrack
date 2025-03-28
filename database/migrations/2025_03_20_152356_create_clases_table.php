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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->dateTime('horario');
            $table->foreignId('entrenador_id')->constrained('users')->onDelete('cascade');
            $table->integer('cupoMax');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('clases');
    }
};
