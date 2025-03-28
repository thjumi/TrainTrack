<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Clase;

class ReservaSeeder extends Seeder
{
    public function run()
    {
        $usuario = User::where('rol', 'usuario')->first();
        $clase   = Clase::first(); // Tomamos la primera clase de ejemplo

        // Creamos una reserva
        Reserva::create([
            'clase_id' => $clase->id,
            'user_id'  => $usuario->id,
            'fechaReserva' => '2025-04-01',
            'confirmado' => true
        ]);
    }
}
