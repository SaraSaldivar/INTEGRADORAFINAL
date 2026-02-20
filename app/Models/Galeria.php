<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $fillable = [
        'imagen',
     
    ];

    public function servicios() {


        return $this->belongsTo(Servicio::class, 'servicio_id');
    }


    
}
