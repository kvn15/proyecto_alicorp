<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conditional extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'tipo_condicion', 'tipo_producto', 'cantidad_condicion'];
}
