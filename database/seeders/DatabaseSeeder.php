<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ClaseSeeder::class,
            EjercicioSeeder::class,
            RutinaSeeder::class,
            ReservaSeeder::class,
            SeguimientoSeeder::class,
            EjercicioRutinaSeeder::class,
        ]);
    }
}
