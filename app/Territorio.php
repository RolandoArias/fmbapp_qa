<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Territorio extends Model
{
    protected $table = "Territorio";

    protected $fillable = [
        'id', 'Name', 'Description'
    ];
}
