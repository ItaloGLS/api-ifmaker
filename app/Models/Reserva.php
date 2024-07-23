<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_name', 'email', 'whatsapp', 'user_type', 'activity_nature', 'project_details', 'target_audience', 'number_of_people', 'horario', 'stations', 'status'
    ];
}
