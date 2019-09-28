<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XgBands extends Model
{
    //
    public $timestamps = false;
    /**
     * Properties:
     * "id"
     * "xg"
     * "minFreq"
     * "maxFreq"
     * "symbol"
     */

    /**
     * Return all bands and their shortcuts
     *
     * @return array An associative array of bands ex: index 2 => 2g bands
     */
    public static function getBands()
    {
        $band0 = XgBands::where('xg', 0)->get();
        $band2 = XgBands::where('xg', 2)->get();
        $band3 = XgBands::where('xg', 3)->get();
        $band4 = XgBands::where('xg', 4)->get();
        $band5 = XgBands::where('xg', 5)->get();
        $bands = [
            "0" => $band0, "2" => $band2, "3" => $band3, "4" => $band4, "5" => $band5
        ];
        return $bands;
    }

    /**
     * Return all bands and their shortcuts
     *
     * @param array $bandIds bandIds array
     *
     * @return array An 1d array of bands symbols same order as given array
     */
    public static function getSymbols(array $bandIds)
    {
        $allXgBand = XgBands::whereIn('id', $bandIds)->get()->mapWithKeys(
            function ($item) {
                return [$item->id => $item];
            }
        );
        $bandSymbols = array();
        foreach ($bandIds as $bandId) {
            $bandSymbols[] = $allXgBand[$bandId]->symbol;
        }
        return $bandSymbols;
    }

    /**
     * Return all bands and their shortcuts
     *
     * @param array $bandIds band array ids
     *
     * @return array An array of App\Bands of given array
     */
    public static function getFullInfoFromIds(array $bandIds)
    {
        // https://stackoverflow.com/questions/30706603/can-i-do-model-whereid-array-multiple-where-conditions/43643737
        $allXgBand = XgBands::whereIn('id', $bandIds)->get()->mapWithKeys(
            function ($item) {
                return [$item->id => $item];
            }
        );
        $allRequestedBand = array();
        foreach ($bandIds as $bandId) {
            $allRequestedBand[] = $allXgBand[$bandId];
        }
        return $allRequestedBand;
    }
}
