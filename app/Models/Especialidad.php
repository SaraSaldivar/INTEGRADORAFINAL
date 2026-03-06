<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $fillable = [

        'activo',
        'nom'
    ];


    public function personal()
    {
        return $this->belongsToMany(Personal::class, 'esp_per', 'especialidad_id', 'personal_id');
    }
}
