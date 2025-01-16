<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AwardProjectDelete extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('participants as b')
        ->join('award_projects as a', 'a.id', '=', 'b.award_project_id')
        ->join('award_projects as c', function ($join) {
            $join->on('c.nombre_premio', '=', 'a.nombre_premio')
                ->where('c.project_id', '=', 34)
                ->where('c.status', '=', 1);
        })
        ->where('a.project_id', 34)
        ->where('a.status', 0)
        ->update(['b.award_project_id' => DB::raw('c.id')]);

        DB::table('award_projects')
        ->where('project_id', 34)
        ->where('status', 0)
        ->delete();
        $this->command->info('Datos eliminados.');
    }
}
