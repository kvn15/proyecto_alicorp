<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminPanel;

class AdminPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminPanel::create([
            'name' => 'Paul Huaman Ortiz',
            'email' => 'paul_luis@yahoo.com',
            'password' => bcrypt('usuario1$')
        ]);
    }
}
