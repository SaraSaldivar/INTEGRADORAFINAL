<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
    'nom',
    'precio',
    'descripcion',
    'activo',
    'imagen',
    'tiempo_estimado',
    'tipo_servicio_id',
];


    public function tipoServicio()
    {
        return $this->belongsTo(Tipo_Servicio::class, 'tipo_servicio_id');
    }

    public function detalleCitas()
    {
        return $this->hasMany(Detalle_Cita::class, 'servicio_id');
    }
}



