<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class XplorerUserSeeder extends Seeder
{

    protected $model = User::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->xplorer()->count(10)->create(); // Crea 10 usuarios
    }
}
