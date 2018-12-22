<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = "Parentesco";

    protected $fillable = [
        'id', 'crmit_codigounico', 'crmit_name', 'crmit_quedefine'
    ];
}
