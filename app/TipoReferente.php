<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoReferente extends Model
{
    protected $table = "Tipo de Referente";

    protected $fillable = [
        'id', 'Tipo de Referente'
    ];
}