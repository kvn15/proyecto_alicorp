<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Paul Huaman Ortiz',
            'email' => 'paul_luis@yahoo.com',
            'password' => bcrypt('usuario1$')
        ]);
        Admin::create([
            'name' => 'Kevin Blas',
            'email' => 'cblash14@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
