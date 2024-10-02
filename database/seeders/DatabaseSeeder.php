<?php

namespace Database\Seeders;

use App\Models\Admin\Asignancion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(15)->create();
        $this->call(AdminUserSeeder::class);
        Asignancion::factory(35)->create();
    }
}
