<?php

namespace Database\Seeders;

use App\Http\Livewire\Xplorer;
use App\Models\User;
use App\Models\Xplorer as ModelsXplorer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CopyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ModelsXplorer::truncate();

        $sourceData = User::select('name', 'email', 'password', 'remember_token', 'apellido', 'telefono', 'tipo_documento', 'documento', 'edad', 'status', 'profile_image')->get();

        foreach ($sourceData as $data) {
            ModelsXplorer::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'apellido' => $data->apellido,
                'telefono' => $data->telefono,
                'tipo_documento' => $data->tipo_documento,
                'documento' => $data->documento,
                'edad' => $data->edad,
                'status' => $data->status,
                'profile_image' => $data->profile_image,
            ]);
        }

        $this->command->info('Datos copiados de SourceModel a DestinationModel.');
    }
}
