<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antennas extends Model
{
    //
    protected $table = 'antennas';
    protected $primaryKey = 'antennaId';

    public function portsNb()
    {
        return $this->{'Total #RF ports'};
    }
    public function bands()
    {
        return $this->hasMany('App\AntennasBands', 'antennaId');
    }
}
