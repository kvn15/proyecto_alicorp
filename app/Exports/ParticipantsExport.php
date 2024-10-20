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
        return DB::table("participants")
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->select('participants.id', 'users.name', 'users.telefono', 'users.email', 'users.documento', 'participants.participaciones', 'participants.terminos_condiciones', 'participants.codigo', 'participants.codigo_valido', 'participants.created_at')
            ->where('participants.project_id', $this->id)
            ->get();
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
