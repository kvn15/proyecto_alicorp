<?php

namespace App\Models\Admin;

use App\Models\User;
use Database\Factories\AsignacionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignancion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','participaciones','terminos_condiciones','codigo', 'codigo_valido'];

    protected static function newFactory()
    {
        return AsignacionFactory::new();
    }

    // Relacion categoria - Uno a Uno
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function search($search) {
        return empty($search) ? static::query() 
            : static::query()
                ->with(['user'])
                ->where('id', 'like', '%'.$search.'%')
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
