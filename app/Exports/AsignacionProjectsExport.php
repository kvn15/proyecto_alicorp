<?php

namespace App\Exports;

use App\Models\AsignacionProject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsignacionProjectsExport implements FromCollection, WithHeadings
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
        return DB::table("asignacion_projects")
            ->join('xplorers', 'xplorers.id', '=', 'asignacion_projects.xplorer_id')
            ->join('award_projects', 'award_projects.id', '=', 'asignacion_projects.award_project_id')
            ->join('sales_points', 'sales_points.id', '=', 'asignacion_projects.sales_point_id')
            ->select('asignacion_projects.id',  'asignacion_projects.created_at', 'xplorers.name as xplorer', 'xplorers.documento', 'sales_points.name as sales_point', 'asignacion_projects.fecha_inicio', 'asignacion_projects.fecha_fin', 
            DB::raw('1 as nro_premio'), 'award_projects.nombre_premio')
            ->where('asignacion_projects.project_id', $this->id)
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Fecha Registro',
            'Nombre Xplorer',
            'Documento',
            'Punto de Venta',
            'Fecha Inicio',
            'Fecha Fin',
            'Nro. Premios',
            'Premios',
        ];
    }
}
