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
            'name' => 'Landing Promocional',
            'ruta_name' => 'landing_promocional',
        ]);
        ProyectType::create([
            'name' => 'Juego Web',
            'ruta_name' => 'juego_web',
        ]);
        ProyectType::create([
            'name' => 'Juego Campaña',
            'ruta_name' => 'juego_campana',
        ]);
    }
}
