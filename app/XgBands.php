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
     * "bands"
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
     * @param array $technology technology array
     * @param array $band       band array
     *
     * @return array An associative array of bands ex: index 2 => 2g bands
     */
    public static function getSymbols(array $technology, array $band)
    {
        $bandSymbols = array();
        $allXgBand = XgBands::getBands();
        foreach ($technology as $key => $tech) {
            foreach ($allXgBand[$tech] as $itemXg) {
                if ($itemXg->bands == $band[$key]) {
                    $bandSymbols[] = $itemXg->symbol;
                    break;
                }
            }
        }
        return $bandSymbols;
    }
}
