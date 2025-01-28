<?php

namespace App\Exports;

use App\Models\Participant;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GanadoresExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
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
        $project = Project::where('id', $this->id)->first();

        if ($project->project_type_id == 3) {

            return Participant::where('participants.project_id', $this->id)
                ->with(['user', 'other_participant'])
                ->leftjoin('users', 'users.id', '=', 'participants.user_id')
                ->leftjoin('other_participants', 'other_participants.id', '=', 'participants.other_participant_id')
                ->join('award_projects', 'award_projects.id', '=', 'participants.award_project_id')
                ->join('sales_points', 'sales_points.id', '=', 'participants.punto_entrega')
                ->select('participants.id', 'participants.created_at',
                DB::raw('COALESCE(users.name, other_participants.nombres) as name'),
                DB::raw('COALESCE(users.apellido, other_participants.apellidos) as apellido'),
                DB::raw('COALESCE(users.telefono, other_participants.telefono) as telefono'),
                DB::raw('COALESCE(users.email, other_participants.correo) as email'),
                DB::raw('COALESCE(users.documento, other_participants.nro_documento) as documento'),
                'participants.participaciones', 'award_projects.nombre_premio',
                'sales_points.name as punto_venta',
                'participants.fecha_premio')
                ->get();
        } else {

            return Participant::where('participants.project_id', $this->id)
                ->with(['user', 'other_participant'])
                ->leftjoin('users', 'users.id', '=', 'participants.user_id')
                ->leftjoin('other_participants', 'other_participants.id', '=', 'participants.other_participant_id')
                ->join('award_projects', 'award_projects.id', '=', 'participants.award_project_id')
                ->select('participants.id', 'participants.created_at',
                DB::raw('COALESCE(users.name, other_participants.nombres) as name'),
                DB::raw('COALESCE(users.apellido, other_participants.apellidos) as apellido'),
                DB::raw('COALESCE(users.telefono, other_participants.telefono) as telefono'),
                DB::raw('COALESCE(users.email, other_participants.correo) as email'),
                DB::raw('COALESCE(users.documento, other_participants.nro_documento) as documento'),
                'participants.participaciones', 'award_projects.nombre_premio', 'participants.fecha_premio')
                ->get();
        }

    }

    public function headings(): array
    {
        $project = Project::where('id', $this->id)->first();
        if ($project->project_type_id == 3) {
            return [
                'ID',
                'Fecha Registro',
                'Nombre',
                'Apellido',
                'Teléfono',
                'Correo',
                'Documento',
                'Participaciones',
                'Premio',
                'Punto de Venta',
                'Fecha Premio',
            ];
        } else {
            return [
                'ID',
                'Fecha Registro',
                'Nombre',
                'Apellido',
                'Teléfono',
                'Correo',
                'Documento',
                'Participaciones',
                'Premio',
                'Fecha Premio',
            ];
        }

    }

    // Aplica estilo a las columnas
    public function styles($sheet)
    {
        // Se puede ajustar el ancho de las columnas de manera manual
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->getColumnDimension('J')->setWidth(50);
        $sheet->getColumnDimension('K')->setWidth(50);

        // Aplica un estilo a las cabeceras
        $sheet->getStyle('A1:K1')->getFont()->setBold(true);

        return [
            // También puedes aplicar otros estilos, por ejemplo, al cuerpo de la tabla
            1    => ['font' => ['bold' => true]], // Para hacer negrita las cabeceras
        ];
    }

    // Autoajustar las columnas (opcional)
    public function autoSize($sheet)
    {
        foreach ($sheet->getColumnDimensions() as $column) {
            $column->setAutoSize(true);  // Esto ajustará automáticamente el tamaño de las columnas según el contenido
        }
    }
}
