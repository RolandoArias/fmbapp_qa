<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $table = "Ciclo";

    protected $fillable = [
        'Id','crmit_name', 'crmit_codigounico'
    ];
}