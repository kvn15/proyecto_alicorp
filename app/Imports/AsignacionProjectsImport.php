<?php

namespace App\Imports;

use App\Models\AsignacionProject;
use App\Models\AwardProject;
use App\Models\SalesPoint;
use App\Models\Xplorer;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AsignacionProjectsImport implements ToModel, WithHeadingRow
{
    protected $project_id; // Propiedad para el ID del usuario

    public function __construct($project_id)
    {
        $this->project_id = $project_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // buscar nombre de xplorer
        $xplorer = Xplorer::where('documento', $row['documento'])->first();
        $sales_point = SalesPoint::where('name', $row['punto_venta'])->first();
        $award_project = AwardProject::where('project_id', $this->project_id)->where('nombre_premio', $row['premio'])->first();

        // Verificar si las variables existen antes de acceder a sus propiedades
        if (!$xplorer) {
            // Manejar el caso cuando no se encuentra el xplorer
            // Por ejemplo, lanzar una excepción o asignar un valor por defecto
            throw new \Exception("Xplorer no encontrado para el documento: " . $row['documento']);
        }

        if (!$sales_point) {
            // Manejar el caso cuando no se encuentra el sales point
            throw new \Exception("Punto de venta no encontrado: " . $row['punto_venta']);
        }

        if (!$award_project) {
            // Manejar el caso cuando no se encuentra el premio
            throw new \Exception("Premio no encontrado: " . $row['premio']);
        }

        $asignacionRepeat = AsignacionProject::where('xplorer_id', $xplorer->id)->where('sales_point_id', $sales_point->id)->where('award_project_id', $award_project->id)->get();

        if ($asignacionRepeat) {
            throw new \Exception($xplorer->name.' ya se encuentra asignado a '.$row['punto_venta'].' con este premio: '.$row['premio']);
        }
        
        return new AsignacionProject([
            'project_id' => $this->project_id,
            'fecha_inicio' => $this->convertDate($row['fecha_inicio']),
            'fecha_fin' => $this->convertDate($row['fecha_fin']),
            'xplorer_id' => $xplorer->id,
            'sales_point_id' => $sales_point->id,
            'award_project_id' => $award_project->id,
            'qty_premio' => $row['qty_premio'],
        ]);
    }

    private function convertDate($date)
    {
        // Verifica si la fecha es un número (número de serie de Excel)
        if (is_numeric($date)) {
            // Convierte el número de serie de Excel a una instancia de DateTime
            return Date::excelToDateTimeObject($date)->format('Y-m-d'); // Cambia el formato según sea necesario
        }

        // Si no es numérico, intenta convertirlo directamente
        return \Carbon\Carbon::parse($date)->format('Y-m-d'); // Cambia el formato según sea necesario
    }
}
