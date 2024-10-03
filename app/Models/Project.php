<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['project_type_id', 'nombre_promocion', 'desc_promocion', 'game_id', 'marcas'];

    // Relacion categoria - Uno a Uno
    public function project_type() {
        return $this->belongsTo(ProyectType::class);
    }

    public static function search($search, $tipoProyecto) {
        return empty($search) ? static::query()->where('project_type_id', $tipoProyecto) 
            : static::query()
                ->where('project_type_id', $tipoProyecto)
                ->where(function($query) use ($search) {
                    $query->where('nombre_promocion', 'like', '%'.$search.'%')
                          ->orWhere('fecha_ini_proyecto', 'like', '%'.$search.'%');
                });
    }
}
