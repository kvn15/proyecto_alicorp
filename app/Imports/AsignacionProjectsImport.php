<?php

namespace App\Imports;

use App\Models\AsignacionProject;
use App\Models\AwardProject;
use App\Models\PremioPdv;
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
        $xplorer = Xplorer::where('name', $row['xplorer'])->first();
        $sales_point = SalesPoint::where('name', $row['punto_venta'])->first();
        $award_project = AwardProject::where('project_id', $this->project_id)->where('nombre_premio', $row['premio'])->first();

        // Verificar si las variables existen antes de acceder a sus propiedades
        if (!$xplorer) {
            // Manejar el caso cuando no se encuentra el xplorer
            // Por ejemplo, lanzar una excepción o asignar un valor por defecto
            throw new \Exception("Xplorer no encontrado: " . $row['xplorer']);
        }

        if (!$sales_point) {
            // Manejar el caso cuando no se encuentra el sales point
            throw new \Exception("Punto de venta no encontrado: " . $row['punto_venta']);
        }

        if (!$award_project) {
            // Manejar el caso cuando no se encuentra el premio
            throw new \Exception("Premio no encontrado: " . $row['premio']);
        }

        // $asignacionRepeat = AsignacionProject::where('xplorer_id', $xplorer->id)->where('sales_point_id', $sales_point->id)->where('award_project_id', $award_project->id)->get();

        // if (count($asignacionRepeat) > 0) {
        //     throw new \Exception($xplorer->name.' ya se encuentra asignado a '.$row['punto_venta'].' con este premio: '.$row['premio']);
        // }

        $asignacionRepeat = AsignacionProject::where('project_id', $this->project_id)->where('xplorer_id', $xplorer->id)->where('sales_point_id', $sales_point->id)->where('fecha_inicio', $this->convertDate($row['fecha_inicio']))->where('fecha_fin', $this->convertDate($row['fecha_fin']))->first();

        if (isset($asignacionRepeat) && !empty($asignacionRepeat)) {

            $premioPdv = PremioPdv::where('asignacion_project_id', $asignacionRepeat->id)->where('award_project_id', $award_project->id)->get();

            if (count($premioPdv) > 0) {
                throw new \Exception($xplorer->name.' ya tiene asignado este premio: '.$row['premio'] . ' en el punto de venta "' . $row['punto_venta'] .'" (Asignacion con ID: '.$asignacionRepeat->id.')');
            }

            return new PremioPdv([
                'asignacion_project_id' => $asignacionRepeat->id,
                'award_project_id' => $award_project->id,
                'qty_premio' => $row['qty_premio'],
                'probabilidad' => $row["probabilidad"]
            ]);

            # code...
        } else {

            $asignacion = AsignacionProject::create([
                'project_id' => $this->project_id,
                'fecha_inicio' => $this->convertDate($row['fecha_inicio']),
                'fecha_fin' => $this->convertDate($row['fecha_fin']),
                'user_id' => $xplorer->id,
                'sales_point_id' => $sales_point->id,
                'award_project_id' => null,
                'qty_premio' => null,
            ]);

            return new PremioPdv([
                'asignacion_project_id' => $asignacion->id,
                'award_project_id' => $award_project->id,
                'qty_premio' => $row['qty_premio'],
                'probabilidad' => $row["probabilidad"]
            ]);
        }
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
