<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;

    protected $fillable = ['project_id',
    'encabezado',
    'pagina_principal',
    'como_participar',
    'formulario_participar',
    'ganadores',
    'preguntas_frecuentes',
    'redes_sociales',
    'html_preview',
    'html_origin',
    'html_end'];
}
