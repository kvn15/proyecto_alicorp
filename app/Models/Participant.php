<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['project_id',
    'user_id',
    'terminos_condiciones',
    'codigo',
    'file_producto',
    'codigo_valido',
    'award_project_id ',
    'fecha_premio',
    'punto_entrega',
    'ganador',
    'participaciones',
    ];
    
    // Relacion categoria - Uno a Uno
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function search($search) {
        return empty($search) ? static::query()
            : static::query()
                ->with(['user'])
                ->where('participants.id', 'like', '%'.$search.'%')
                ->orWhere('participaciones', 'like', '%'.$search.'%')
                ->orWhere('codigo', 'like', '%'.$search.'%')
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%'.$search.'%')
                        ->orWhere('telefono', 'like', '%'.$search.'%')
                        ->orWhere('documento', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
                });
    }

    public static function searchGanador($search) {
        return empty($search) ? static::query()->where('ganador', 1)
            : static::query()
                ->where('ganador', 1)
                ->with(['user'])
                ->where('participants.id', 'like', '%'.$search.'%')
                ->orWhere('participaciones', 'like', '%'.$search.'%')
                ->orWhere('codigo', 'like', '%'.$search.'%')
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%'.$search.'%')
                        ->orWhere('telefono', 'like', '%'.$search.'%')
                        ->orWhere('documento', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
                });
    }
}
