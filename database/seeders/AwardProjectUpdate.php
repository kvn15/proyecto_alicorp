<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AwardProjectUpdate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('premio_pdvs as b')
        ->join('asignacion_projects as a', 'a.id', '=', 'b.asignacion_project_id')
        ->join('award_projects as c', 'c.id', '=', 'b.award_project_id')
        ->join('award_projects as d', function ($join) {
            $join->on('d.nombre_premio', '=', 'c.nombre_premio')
                ->where('d.status', '=', 1)
                ->where('d.project_id', '=', 34);
        })
        ->where('a.project_id', 34)
        ->where('c.status', 0)
        ->update(['b.award_project_id' => DB::raw('d.id')]);
        $this->command->info('Datos actualizados.');
    }
}
