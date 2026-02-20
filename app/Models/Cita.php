<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'apartado',
        'personal_id',
        'hora_c',
        'fecha_c',
        'estado',
        'cliente_id',
    ];

}
