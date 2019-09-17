<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntennasBands extends Model
{
    //
    protected $table = 'bands';
    protected $primaryKey = 'id';
    protected $connection = "mysql";
}
