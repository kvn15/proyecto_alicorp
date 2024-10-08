<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Raspa y gana'
        ]);
        Game::create([
            'name' => 'Ruleta'
        ]);
        Game::create([
            'name' => 'Memoria'
        ]);
    }
}
