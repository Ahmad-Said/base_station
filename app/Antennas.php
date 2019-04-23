<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antennas extends Model
{
    //
    protected $table = 'antennas';
    protected $primaryKey = 'antennaId';

    /**
     * A shortcuts to get ports number of antennas
     *
     * @return int number of ports
     */
    public function portsNb()
    {
        return $this->{'Total #RF ports'};
    }

    /**
     * A shortcuts to get ports number of antennas
     *
     * @return AntennasBand the related band in database
     */
    public function bands()
    {
        return $this->hasMany('App\AntennasBands', 'antennaId');
    }
}
