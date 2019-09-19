<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntennasBandsProvider extends Model
{
    //
    protected $table = 'bands';
    protected $primaryKey = 'bandId';
    protected $connection = 'mysql2';


    /**
     * Bands Provider
     *
     * Copy all bands data to default database with class associated as Bands
     *
     * @return void
     */
    public static function provideDataToAntennasBands()
    {
        // AntennasBands::truncate();
        // https://stackoverflow.com/questions/31192207/laravel-5-1-migration-and-seeding-cannot-truncate-a-table-referenced-in-a-foreig
        AntennasBands::query()->delete();
        $neededColumn = [
            "bandId" => "id",
            "min" => "min",
            "max" => "max",
            "color" => "color",
            "antennaId" => "antennas_id",
        ];
        foreach ($neededColumn as $key => $value) {
            $stringSelect[] = $key . " as " . $value;
        }
        AntennasBands::insert(AntennasBandsProvider::all($stringSelect)->toArray());
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
