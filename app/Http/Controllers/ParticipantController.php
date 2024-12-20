<?php

namespace App\Http\Controllers;

use App\Exports\AsignacionProjectsExport;
use App\Exports\GanadoresExport;
use App\Exports\ParticipantsExport;
use App\Models\AwardProject;
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

        if ($request->idPremio > 0) {
            // Reducir el stock del premio
            $premio = AwardProject::findOrFail($request->idPremio);
            $premio->update([
                "stock" =>  $premio->stock - 1
            ]);
        }

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

    public function exportAsignacion($id)
    {
        return Excel::download(new AsignacionProjectsExport($id), 'asignaciones.xlsx');
    }

}
