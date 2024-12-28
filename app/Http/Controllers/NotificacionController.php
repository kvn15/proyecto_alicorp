<?php

namespace App\Http\Controllers;

use App\Mail\NotificationTyC;
use App\Models\Admin;
use App\Models\OtherParticipant;
use App\Models\Participant;
use App\Models\Project;
use App\Models\ProyectType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificacionController extends Controller
{
    public function notificacionTyC($idParticipant) {

        $participant = Participant::where('id', $idParticipant)->first();
        $project = Project::where('id', $participant->project_id)->first();
        $admin = Admin::where('id', $project->admin_id)->first();
        $tipo = ProyectType::where('id', $project->project_type_id)->first();

        $nombre = '';
        $apellido = '';
        $correo = '';
        $telefono = '';
        $documento = '';
        $codigo = '';

        if ($participant->user_id == null || empty($participant->user_id)) {
            $otherParticipant = OtherParticipant::where('id', $participant->other_participant_id)->first();
            $nombre = $otherParticipant->nombres;
            $apellido = $otherParticipant->apellidos;
            $correo = $otherParticipant->correo;
            $telefono = $otherParticipant->telefono;
            $documento = $otherParticipant->nro_documento;
        } else {
            $user = User::where('id', $participant->user_id)->first();
            $nombre = $user->name;
            $apellido = $user->apellido ?? "";
            $correo = $user->email;
            $telefono = $user->telefono ?? "";
            $documento = $user->documento ?? "";
        }
        $codigo = $participant->codigo;

        $response = Mail::to($admin->email)
        ->queue(new NotificationTyC($nombre, $apellido, $correo, $telefono, $documento, $project->nombre_promocion, $tipo->name, $participant->created_at, $codigo)); // envia el email en segundo plano
    }
}
