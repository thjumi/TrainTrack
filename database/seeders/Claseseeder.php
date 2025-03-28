<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clase;
use App\Models\User;

class ClaseSeeder extends Seeder
{
    public function run()
    {
        // Buscamos un usuario con rol 'entrenador'
        $entrenador = User::where('rol', 'entrenador')->first();

        Clase::create([
            'nombre' => 'Yoga Matutino',
            'descripcion' => 'Clase de yoga para principiantes, enfoque en respiración y estiramientos.',
            'horario' => '2025-04-01 07:00:00',
            'entrenador_id' => $entrenador->id ?? 2,
            'cupoMax' => 15
        ]);

        Clase::create([
            'nombre' => 'Zumba Express',
            'descripcion' => 'Entrenamiento intenso de 30 minutos para quemar calorías rápidamente.',
            'horario' => '2025-04-02 18:00:00',
            'entrenador_id' => $entrenador->id ?? 2,
            'cupoMax' => 20
        ]);
    }
}
