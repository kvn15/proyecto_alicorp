<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaspaGana extends Model
{
    use HasFactory;

    protected $table = 'raspa_ganas';

    protected $fillable = ['project_id','fondo','titulo','logo_principal', 'imagen_raspar', 'boton_premios', 'titulo_subir','politicas',
    'terminos', 'titulo_ganastes'];
}
