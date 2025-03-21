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
            $table->id();
            $table->foreignId('clase_id')->constrained('clases');
            $table->foreignId('usuario_id')->constrained('users');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('reservas');
    }
};
