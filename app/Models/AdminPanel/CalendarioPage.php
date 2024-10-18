<?php

namespace App\Models\AdminPanel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'caledario_slide'
    ];
}
