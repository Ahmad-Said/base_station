<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AntennasBandsProvider extends Model
{
    //
    protected $table = 'bands';
    protected $primaryKey = 'bandId';
    protected $connection = 'mysql2';

    /**
     * Properties:
     * "id"  useless
     * "min"
     * "max"
     * "color"
     * "totalPorts"
     * "antennas_id"
     */

    /**
     * Bands Provider
     *
     * Copy all bands data to default database with class associated as Bands
     *
     * @deprecated use provideDataToAntennasAndBands() instead
     *
     * @return void
     */
    public static function provideDataToAntennasBands()
    {
        // https://stackoverflow.com/questions/31192207/laravel-5-1-migration-and-seeding-cannot-truncate-a-table-referenced-in-a-foreig
        AntennasBands::truncate();
        $neededColumn = [
            "bandId" => "id",
            "min" => "min",
            "max" => "max",
            "color" => "color",
            "antennaId" => "antennas_id",
        ];
        AntennasBands::insert(
            AntennasBandsProvider::selectRaw(
                "bandId as id, min, max, color,
                 antennaId as antennas_id,  COUNT(*)*2 as totalPorts"
            )->groupBy("min", "max", "antennaId")->get()->toArray()
        );
    }

    /**
     * Antennas Provider
     *
     * Copy all antennas data with bands to default database
     *  with class associated as Antennas and AntennasBands
     * Column needed index -> property  type
     *
     * @return void
     */
    public static function provideDataToAntennasAndBands()
    {
        AntennasProvider::provideDataToAntennasAndBands();
    }
}
