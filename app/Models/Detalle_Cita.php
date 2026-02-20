<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Cita extends Model
{
    protected $fillable = [
        'cita_id',
        'servicio_id',
        'precio_capturado',
    ];

}
