<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardProject extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'orden', 'nombre_premio', 'stock', 'probabilidad'];
}
