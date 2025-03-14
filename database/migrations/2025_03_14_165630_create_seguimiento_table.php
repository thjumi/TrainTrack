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
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->id('seguimiento_id')->nullable();
            $table->foreignId('usuario_id')->refernce('id')->on('usuarios')->onDelete('cascade')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('progreso')->nullable();
            $table->string('notas')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento');
    }
};
