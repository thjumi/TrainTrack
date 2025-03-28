<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rutina;
use App\Models\User;

class RutinaSeeder extends Seeder
{
    public function run()
    {
        // Buscamos un usuario con rol 'user'
        $usuario = User::where('rol', 'usuario')->first();

        if (!$usuario) {
            $this->command->info("No se encontró un usuario con rol 'user'");
            return;
        }

 
        Rutina::create([
            'user_id' => $usuario->id,
            'nombre' => 'Rutina de Fuerza',
            'descripcion' => 'Enfoque en ejercicios compuestos para ganar fuerza.',
            'fechaCreacion' => '2025-04-01'
        ]);

        Rutina::create([
            'user_id' => $usuario->id,
            'nombre' => 'Rutina de Resistencia',
            'descripcion' => 'Circuitos de alta repetición para mejorar la resistencia cardiovascular.',
            'fechaCreacion' => '2025-04-02'
        ]);
    }
}
