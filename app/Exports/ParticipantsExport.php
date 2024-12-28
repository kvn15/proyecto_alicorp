<?php

namespace App\Exports;

use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ParticipantsExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
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

        $firstQuery = DB::table("participants")
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->select(
                'participants.id',
                'users.name',
                'users.telefono',
                'users.email',
                'users.documento',
                'participants.participaciones',
                DB::raw(' IF(participants.terminos_condiciones = 1, "Acepto", "No Acepto")  AS terminos_condiciones'),
                'participants.codigo',
                DB::raw(' IF(participants.codigo_valido = 1, "Correcto", "Incorrecto")  AS codigo_valido'),
                'participants.created_at'
            )
            ->where('participants.project_id', $this->id);
        
        $secondQuery = DB::table("participants")
            ->join('other_participants', 'other_participants.id', '=', 'participants.other_participant_id')
            ->select(
                'participants.id',
                'other_participants.nombres as name', 
                'other_participants.telefono',
                'other_participants.correo',
                'other_participants.nro_documento',
                'participants.participaciones',
                DB::raw(' IF(participants.terminos_condiciones = 1, "Acepto", "No Acepto")  AS terminos_condiciones'),
                'participants.codigo',
                DB::raw(' IF(participants.codigo_valido = 1, "Correcto", "Incorrecto")  AS codigo_valido'),
                'participants.created_at'
            )
            ->where('participants.project_id', $this->id);
            
        return $firstQuery->unionAll($secondQuery)->get();
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

    // Aplica estilo a las columnas
    public function styles($sheet)
    {
        // Se puede ajustar el ancho de las columnas de manera manual
        $sheet->getColumnDimension('A')->setWidth(10);  
        $sheet->getColumnDimension('B')->setWidth(20); 
        $sheet->getColumnDimension('C')->setWidth(30);  
        $sheet->getColumnDimension('D')->setWidth(15);  
        $sheet->getColumnDimension('E')->setWidth(20);  
        $sheet->getColumnDimension('F')->setWidth(15);  
        $sheet->getColumnDimension('G')->setWidth(15);  
        $sheet->getColumnDimension('H')->setWidth(15);  
        $sheet->getColumnDimension('I')->setWidth(15); 
        $sheet->getColumnDimension('J')->setWidth(50); 

        // Aplica un estilo a las cabeceras
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);

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
