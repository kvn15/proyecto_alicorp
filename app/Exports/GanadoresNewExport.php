<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;

class GanadoresNewExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([
            ['documento', 'codigo_producto', 'premio'], // Encabezados de columnas
            ['', '', ''], // Agregar una fila vacía para la entrada de datos
            // Puedes agregar más filas predeterminadas si es necesario
        ]);
    }
}
