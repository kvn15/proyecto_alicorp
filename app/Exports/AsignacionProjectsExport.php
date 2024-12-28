<?php

namespace App\Exports;

use App\Models\AsignacionProject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AsignacionProjectsExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
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
        return AsignacionProject::where('asignacion_projects.project_id', $this->id)
            ->with('user')
            ->join('users', 'users.id', '=', 'asignacion_projects.user_id')
            ->join('sales_points', 'sales_points.id', '=', 'asignacion_projects.sales_point_id')
            ->join('premio_pdvs', 'premio_pdvs.asignacion_project_id', 'asignacion_projects.id')
            ->join('award_projects', 'premio_pdvs.award_project_id', 'award_projects.id')
            ->select('asignacion_projects.id',  'asignacion_projects.created_at', 'users.name as xplorer', 'users.documento', 'sales_points.name as sales_point', 'asignacion_projects.fecha_inicio', 'asignacion_projects.fecha_fin', 
            DB::raw('COUNT(premio_pdvs.id) as nro_premio'), 
            DB::raw('GROUP_CONCAT(award_projects.nombre_premio SEPARATOR ", ") as nombre_premio'))
            ->groupBy(
                'asignacion_projects.id', 
                'asignacion_projects.created_at', 
                'users.name', 
                'users.documento', 
                'sales_points.name', 
                'asignacion_projects.fecha_inicio', 
                'asignacion_projects.fecha_fin'
            )
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

     // Aplica estilo a las columnas
     public function styles($sheet)
     {
         // Se puede ajustar el ancho de las columnas de manera manual
         $sheet->getColumnDimension('A')->setWidth(10);  // ID
         $sheet->getColumnDimension('B')->setWidth(20);  // Fecha Registro
         $sheet->getColumnDimension('C')->setWidth(30);  // Nombre Xplorer
         $sheet->getColumnDimension('D')->setWidth(15);  // Documento
         $sheet->getColumnDimension('E')->setWidth(20);  // Punto de Venta
         $sheet->getColumnDimension('F')->setWidth(15);  // Fecha Inicio
         $sheet->getColumnDimension('G')->setWidth(15);  // Fecha Fin
         $sheet->getColumnDimension('H')->setWidth(15);  // Nro. Premios
         $sheet->getColumnDimension('I')->setWidth(50);  // Premios
 
         // Aplica un estilo a las cabeceras
         $sheet->getStyle('A1:I1')->getFont()->setBold(true);
 
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
