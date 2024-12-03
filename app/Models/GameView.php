<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameView extends Model
{
    use HasFactory;

    protected $fillable = ['project_id',
    'principal',
    'premio',
    'premio_img',
    'html_preview',
    'html_origin',
    'html_end',
    'politicas',
    'terminos'
];
}
