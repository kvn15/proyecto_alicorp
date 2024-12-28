<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GanadoresNewExport implements FromCollection, WithStyles, ShouldAutoSize
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

    // Aplica estilo a las columnas
    public function styles($sheet)
    {
        // Se puede ajustar el ancho de las columnas de manera manual
        $sheet->getColumnDimension('A')->setWidth(10);  
        $sheet->getColumnDimension('B')->setWidth(20);  
        $sheet->getColumnDimension('C')->setWidth(30);

        return [
            // También puedes aplicar otros estilos, por ejemplo, al cuerpo de la tabla
            1    => ['font' => ['bold' => false]], // Para hacer negrita las cabeceras
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
