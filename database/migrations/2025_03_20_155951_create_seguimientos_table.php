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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('rutina_id')->constrained('rutinas')->onDelete('cascade');
            $table->float('peso');
            $table->float('altura');
            $table->timestamp('fecha');
            $table->float('progreso');
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('seguimientos');
    }
};
