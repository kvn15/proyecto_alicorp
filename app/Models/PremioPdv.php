<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremioPdv extends Model
{
    use HasFactory;

    protected $table = 'premio_pdvs';

    protected $fillable = ['asignacion_project_id', 'award_project_id', 'qty_premio'];

    public function asignacion_projects()
    {
        return $this->belongsTo(AsignacionProject::class, 'asignacion_project_id');  // Relación inversa de muchos a uno
    }
    
    // Relacion categoria - Uno a Uno
    public function award_project() {
        return $this->belongsTo(AwardProject::class, 'award_project_id');
    }
}
