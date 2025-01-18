<?php

namespace App\Http\Controllers;

use App\Exports\AsignacionProjectsExport;
use App\Exports\GanadoresExport;
use App\Exports\ParticipantsExport;
use App\Models\AwardProject;
use App\Models\Participant;
use App\Models\PremioPdv;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{
    //
    public function ganador(Request $request, $id) {

        $project = Project::where("id", $request->idProject)->first();
        $participante = Participant::findOrFail($id);

        if ($project->project_type_id == 3) {// Juegos campaña

            $award = PremioPdv::where('id', $request->idPremio)->first();

            $participante->update([
                "ganador" => $request->idPremio == 0 ? 0 : 1,
                "fecha_premio" => Carbon::now(),
                "award_project_id" => $request->idPremio == 0 ? null : $award->award_project_id
            ]);

            if ($request->idPremio > 0) {
                $award->update([
                    "qty_premio" =>  $award->qty_premio - 1
                ]);
            }

            $participante->update([
                'premio_pdv_id' => $request->idPremio == 0 ? null : $request->idPremio
            ]);
        } else {
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
            } else {

                $project->update([
                    'cantidad_no_premio' => $project->cantidad_no_premio ? intval($project->cantidad_no_premio)- 1 : 0
                ]);
            }
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
