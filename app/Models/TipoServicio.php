<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Servicio extends Model
{
    protected $fillable = [
        'activo',
        'nombre'
    
    ];


    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'tipo_servicio_id');

    }
}
