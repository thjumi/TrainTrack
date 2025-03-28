<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ejercicio;

class EjercicioSeeder extends Seeder
{
    public function run()
    {
        Ejercicio::create([
            'nombre' => 'Sentadillas',
            'descripcion' => 'Ejercicio para fortalecer piernas y glúteos.',
            'grupoMuscular' => 'Piernas',
            'dificultad' => 2 // Si es int, ajusta si usas string
        ]);

        Ejercicio::create([
            'nombre' => 'Plancha',
            'descripcion' => 'Ejercicio isométrico para fortalecer el core.',
            'grupoMuscular' => 'Abdominales',
            'dificultad' => 3
        ]);
    }
}
