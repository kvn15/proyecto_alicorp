<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Xplorer;

class XplorerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Xplorer::create([
            'name' => 'Xplorer',
            'email' => 'xplorer@xplora.net',
            'password' => bcrypt('usuario1$'),
            'documento' => '123456789'
        ]);

        Xplorer::factory()->count(10)->create(); // Crea 10 usuarios
    }
}
