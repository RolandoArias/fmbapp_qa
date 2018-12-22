<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = "Nivel de Estudios";

    protected $fillable = [
        'crmit_name', 'crmit_codigounico'
    ];
}
