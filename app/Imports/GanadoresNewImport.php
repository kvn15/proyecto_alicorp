<?php

namespace App\Imports;

use App\Models\AwardProject;
use App\Models\OtherParticipant;
use App\Models\Participant;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class GanadoresNewImport implements OnEachRow, WithHeadingRow
{
    protected $project_id; // Propiedad para el ID del usuario

    public function __construct($project_id)
    {
        $this->project_id = $project_id;
    }
    
    /**
     * Se ejecuta para cada fila del archivo Excel.
     * 
     * @param Row $row
     */
    public function onRow(Row $row)
    {
        $row = $row->toArray();  // Convierte la fila a un array

        // Verificar si la fila tiene los datos necesarios
        if (empty($row['documento']) || empty($row['codigo_producto'])) {
            // Si la fila no contiene datos clave, omitirla
            return null;
        }

        $person = User::where('documento', $row['documento'])->first();
        $other_person = OtherParticipant::where('nro_documento', $row['documento'])->first();
        
        // Buscar el Participant con cualquiera de los dos IDs encontrados (user_id o other_participant_id)
        $participant = null;
        
        if ($person) {
            // Buscar el Participant relacionado con el User
            $participant = Participant::where('user_id', $person->id)->where('codigo', $row['codigo_producto'])->first();
        }
        
        if (!$participant && $other_person) {
            // Si no encontramos el Participant, buscar con el OtherParticipant
            $participant = Participant::where('other_participant_id', $other_person->id)->where('codigo', $row['codigo_producto'])->first();
        }
        
        if (!isset($participant) && empty($participant)) {
            // Manejar el caso cuando no se encuentra el sales point
            throw new \Exception("Participante no encontrado: " . $row['documento'] . $row['codigo_producto']);
        }

        // Obtener premio
        $premio = AwardProject::where('project_id', $this->project_id)->where('nombre_premio', $row['premio'])->first();

        if (!$premio) {
            // Manejar el caso cuando no se encuentra el sales point
            throw new \Exception("Premio no encontrado: " . $row['premio']);
        }


        // Aquí puedes realizar las operaciones que necesites con cada fila.
        // Asegúrate de que no intentes insertar la cabecera como un registro
        if ($row) {
            $participant->update([
                'ganador' => 1,
                'award_project_id' => $premio->id,
                "fecha_premio" => Carbon::now()
            ]);
        }
    }
}
