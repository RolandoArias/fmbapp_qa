<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csq extends Model
{
    protected $table = "CSQ";

    protected $fillable = [
        'id', 'crmit_codigounico', 'crmit_name', 'crmit_quedefine'
    ];
}
