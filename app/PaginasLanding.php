<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaginasLanding extends Model
{
    protected $table = "Pagina Landing";

    protected $fillable = [
        'id', 'crmit_codigounico', 'crmit_name', 'crmit_quedefine'
    ];
}
