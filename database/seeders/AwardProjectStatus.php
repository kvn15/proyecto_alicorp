<?php

namespace Database\Seeders;

use App\Models\AwardProject;
use Illuminate\Database\Seeder;

class AwardProjectStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = AwardProject::where('project_id', 34)
            ->where('id', '>=', 103)
            ->where('id', '<=', 114)
            ->update(['status' => 0]);
        $this->command->info('Datos actualizados.');
    }
}
