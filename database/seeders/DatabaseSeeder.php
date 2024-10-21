<?php

namespace Database\Seeders;

use App\Models\Admin\Asignancion;
use Illuminate\Database\Seeder;
use App\Models\Xplorer;
use App\Models\SalesPoint;

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
        $this->call(ProjectTypesSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(XplorerSeeder::class);
        $this->call(PointSaleSeeder::class);
    }
}
