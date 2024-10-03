<?php

namespace Database\Seeders;

use App\Models\ProyectType;
use Illuminate\Database\Seeder;

class ProjectTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProyectType::create([
            'name' => 'Landing Promocional'
        ]);
        ProyectType::create([
            'name' => 'Juego Web'
        ]);
        ProyectType::create([
            'name' => 'Juego Campaña'
        ]);
    }
}
