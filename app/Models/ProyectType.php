<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectType extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    // Relacion categoria - Uno a Uno
    public function project() {
        return $this->belongsTo(Project::class);
    }
}
