<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionProject extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','xplorer_id','fecha_inicio','fecha_fin','sales_point_id','award_project_id','qty_premio'];

    // Relacion categoria - Uno a Uno
    public function xplorer() {
        return $this->belongsTo(Xplorer::class, 'xplorer_id');
    }
    
    // Relacion categoria - Uno a Uno
    public function award_project() {
        return $this->belongsTo(AwardProject::class, 'award_project_id');
    }
    
    // Relacion categoria - Uno a Uno
    public function sales_point() {
        return $this->belongsTo(SalesPoint::class, 'sales_point_id');
    }

    public function premio_pdvs()
    {
        return $this->hasMany(PremioPdv::class, 'asignacion_project_id');  // Relación uno a muchos
    }

    public static function search($search) {
        return empty($search) ? static::query()
            : static::query()
                ->with(['xplorer', 'sales_point', 'award_project'])
                ->where('asignacion_projects.id', 'like', '%'.$search.'%')
                ->orWhere('qty_premio', 'like', '%'.$search.'%')
                ->orWhere('asignacion_projects.fecha_inicio', 'like', '%'.$search.'%')
                ->orWhere('asignacion_projects.fecha_fin', 'like', '%'.$search.'%')
                ->orWhereHas('xplorer', function ($q) use ($search) {
                    $q->where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->orWhere('documento', 'like', '%'.$search.'%');
                })
                ->orWhereHas('sales_point', function ($q) use ($search) {
                    $q->where('name', 'like', '%'.$search.'%');
                })
                ->orWhereHas('award_project', function ($q) use ($search) {
                    $q->where('nombre_premio', 'like', '%'.$search.'%');
                });
    }
}
