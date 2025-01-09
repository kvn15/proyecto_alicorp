<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roulette extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','fondo','titulo_inicio','logo_inicio', 'titulo_juego', 'logo_juego', 'elementos_juego', 'titulo_premio', 'boton_premio', 'bloque_premios'
    ,'politicas',
    'terminos', 'titulo_ganastes'];
}
