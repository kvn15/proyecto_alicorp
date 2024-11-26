<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeepTrying extends Model
{
    use HasFactory;
    
    protected $fillable = ['project_id', 'imagen', 'imagen_no_premio'];
}
