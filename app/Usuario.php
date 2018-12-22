<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "Usuario";

    protected $fillable = [
        'id', 'domainname', 'crmit_campusid', 'crmit_areaatencion'
    ];
}