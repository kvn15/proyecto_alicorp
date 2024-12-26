<?php

namespace App\Exports;

use App\Models\AsignacionProject;
use Maatwebsite\Excel\Concerns\FromCollection;

class AsignacionProjectsFormatoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([
            ['fecha_inicio', 'fecha_fin', 'xplorer', 'punto_venta', 'premio', 'qty_premio', 'probabilidad'], // Encabezados de columnas
            ['', '', '', '', '', '', ''], // Agregar una fila vacía para la entrada de datos
            // Puedes agregar más filas predeterminadas si es necesario
        ]);
    }
}
