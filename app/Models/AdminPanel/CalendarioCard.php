<?php

namespace App\Models\AdminPanel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioCard extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'image_path','event_date'];
}
