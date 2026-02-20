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
}
