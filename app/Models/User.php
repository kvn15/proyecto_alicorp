<?php

namespace App\Models;

use App\Models\Admin\Asignancion;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'documento',
        'tipo_documento',
        'edad',
        'apellido',
        'is_xplorer',
        'status',
        'profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function asignancion()
    {
        return $this->belongsTo(Asignancion::class);
    }

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
