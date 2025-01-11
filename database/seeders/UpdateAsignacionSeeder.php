<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateAsignacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignacion_projects AS A')
        ->join('users AS B', 'A.user_id', '=', 'B.id')
        ->join('xplorers AS C', 'C.documento', '=', 'B.documento')
        ->update([
            'A.xplorer_id' => DB::raw('C.id'),
            'A.user_id' => null,
        ]);

        $this->command->info('Datos actualizados.');
    }
}
