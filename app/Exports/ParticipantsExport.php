<?php

namespace App\Exports;

use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantsExport implements FromCollection, WithHeadings
{
    protected $id; // Define aquí los parámetros que necesitas

    public function __construct($id = null)
    {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $firstQuery = DB::table("participants")
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->select(
                'participants.id',
                'users.name',
                'users.telefono',
                'users.email',
                'users.documento',
                'participants.participaciones',
                'participants.terminos_condiciones',
                'participants.codigo',
                'participants.codigo_valido',
                'participants.created_at'
            )
            ->where('participants.project_id', $this->id);
        
        $secondQuery = DB::table("participants")
            ->join('other_participants', 'other_participants.id', '=', 'participants.other_participant_id')
            ->select(
                'participants.id',
                'other_participants.nombres as name', 
                'other_participants.telefono',
                'other_participants.correo',
                'other_participants.nro_documento',
                'participants.participaciones',
                'participants.terminos_condiciones',
                'participants.codigo',
                'participants.codigo_valido',
                'participants.created_at'
            )
            ->where('participants.project_id', $this->id);
            
        return $firstQuery->unionAll($secondQuery)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Teléfono',
            'Correo',
            'Documento',
            'Participaciones',
            'T&C',
            'Codígo',
            'Codígo',
            'Fecha Registro',
        ];
    }
}
