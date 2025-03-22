<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'rol' => 'administrador',
        ]);

        User::factory()->create([
            'name' => 'Entrenador',
            'email' => 'entrenador@example.com',
            'rol' => 'usuario',
        ]);
        
        User::factory()->create([
            'name' => 'Usuario',
            'email' => 'usuario@example.com',
            'rol' => 'usuario',
        ]);
        
    }
}
