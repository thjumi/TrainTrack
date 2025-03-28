<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seguimiento;
use App\Models\User;
use App\Models\Rutina;

class SeguimientoSeeder extends Seeder
{
    public function run()
    {
        $usuario = User::where('rol', 'usuario')->first();
        $rutina  = Rutina::first(); //la primera rutina

        Seguimiento::create([
            'user_id' => $usuario->id,
            'rutina_id' => $rutina->id,
            'peso' => 70,
            'altura' => 1.70,
            'fecha' => now(),
            'progreso'=> 70,
            'notas' => 'Comenzando la rutina de fuerza',
        ]);
    }
}
