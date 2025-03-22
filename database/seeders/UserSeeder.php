<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin12345'),
            'rol' => 'administrador',
        ]);

        User::create([
            'name' => 'Entrenador',
            'email' => 'entrenador@example.com',
            'password' => bcrypt('entrenador12345'),
            'rol' => 'entrenador',
        ]);

        User::create([
            'name' => 'Usuario',
            'email' => 'usuario@example.com',
            'password' => bcrypt('user12345'),
            'rol' => 'usuario',
        ]);
    }
}

