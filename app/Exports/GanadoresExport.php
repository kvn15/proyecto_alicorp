<?php

namespace App\Exports;

use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GanadoresExport implements FromCollection, WithHeadings
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
            ->join('award_projects', 'award_projects.id', '=', 'participants.award_project_id')
            ->select('participants.id',  'participants.created_at', 'users.name', 'users.telefono', 'users.email', 'users.documento', 'participants.participaciones', 'award_projects.nombre_premio', 'participants.fecha_premio')
            ->where('participants.project_id', $this->id)
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Fecha Registro',
            'Nombre',
            'Teléfono',
            'Correo',
            'Documento',
            'Participaciones',
            'Premio',
            'Fecha Premio',
        ];
    }
}
