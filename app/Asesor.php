<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $table = "Asesor cita";

    protected $fillable = [
        'asesorid','Nombre_Asesor'
    ];
}
