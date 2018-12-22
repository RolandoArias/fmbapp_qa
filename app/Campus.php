<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = "Campus";

    protected $fillable = [
        "crmit_name", "crmit_codigounico", "crmit_tb_campusid"
    ];
}
