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


    public function cita() 
    {
        return $this->belongsTo(Cita::class, 'cita_id');


    }

    public function servicio() 
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    
}
