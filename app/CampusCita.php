<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampusCita extends Model
{
    protected $table = "Campus Cita";

    protected $fillable = [
        'id', 'Nombre_de_Campus', 'id_de_campus'
    ];
}
