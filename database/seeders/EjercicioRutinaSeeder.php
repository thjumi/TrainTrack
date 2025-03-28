<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EjercicioRutina;
use App\Models\Ejercicio;
use App\Models\Rutina;

class EjercicioRutinaSeeder extends Seeder
{
    public function run()
    {
        $rutina    = Rutina::first();
        $ejercicio = Ejercicio::first();

        EjercicioRutina::create([
            'rutina_id' => $rutina->id,
            'ejercicio_id' => $ejercicio->id,
            'repeticiones' => 10,
            'series' => 3,
            'descansos' => 10
        ]);
    }
}
