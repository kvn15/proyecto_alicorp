<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherParticipant extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellidos', 'tipo_doc', 'nro_documento', 'edad', 'telefono', 'correo'];
}
