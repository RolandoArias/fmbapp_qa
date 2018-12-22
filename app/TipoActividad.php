<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{
    protected $table = "Tipo de Actividad";

    protected $fillable = [
        'crmit_codigounico', 'crmit_name', 'crmit_abreviatura'
    ];
}
