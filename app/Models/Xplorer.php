<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Xplorer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'xplorer';

    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'documento',
        'tipo_documento',
        'edad',
        'apellido',
        'status',
        'profile_image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function asignacion_project()
    {
        return $this->belongsTo(AsignacionProject::class);
    }

    public static function search($search) {
        return empty($search) ? static::query()
            : static::query()
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('apellido', 'like', '%'.$search.'%')
                ->orWhere('telefono', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('documento', 'like', '%'.$search.'%')
                ->orWhere('edad', 'like', '%'.$search.'%')
                ->orWhere('tipo_documento', 'like', '%'.$search.'%');
    }
}
