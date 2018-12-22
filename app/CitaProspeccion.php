<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitaProspeccion extends Model
{
    protected $table = "Cita de Prospección";

    protected $fillable = [
        'id', 'RegardingObjectId', 'crmit_fechacierre', 'ScheduledStar', 'ScheduledEnd', 'crmit_nocita', 'Subject', 'statuscode'
    ];
}
