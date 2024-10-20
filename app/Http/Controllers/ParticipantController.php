<?php

namespace App\Http\Controllers;

use App\Exports\GanadoresExport;
use App\Exports\ParticipantsExport;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{
    //
    public function ganador(Request $request, $id) {
        
        $participante = Participant::findOrFail($id);

        $participante->update([
            "ganador" => $request->idPremio == 0 ? 0 : 1,
            "fecha_premio" => Carbon::now(),
            "award_project_id" => $request->idPremio == 0 ? null : $request->idPremio
        ]);

        return response()->json(['message' => 'Se actualizo']);
    }

    public function export($id)
    {
        return Excel::download(new ParticipantsExport($id), 'participantes.xlsx');
    }

    public function exportGanador($id)
    {
        return Excel::download(new GanadoresExport($id), 'ganadores.xlsx');
    }

}
