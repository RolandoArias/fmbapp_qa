<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinCorreo extends Model
{
    protected $table = "Sin Correo";

    protected $fillable = [
        'id', 'crmit_sincorreo'
    ];
}
