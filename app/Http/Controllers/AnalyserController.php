<?php

namespace App\Http\Controllers;

use App\XgBands;
use App\Antennas;
use Illuminate\Http\Request;
use function Opis\Closure\unserialize;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class AnalyserController extends Controller
{
    public static $debug = "a new debug session";
    /**
     * The welcome page
     *
     * @return view - welcome -> /
     */
    public function index()
    {
        return view('welcome')
            ->with("bands", XgBands::getBands());
    }

    /**
     * Receive form information to analyse them and return result
     *
     * @param Request $request system_number
     *                         | antenna_per_sector
     *                         | antenna_preferred (may not exist) default is one
     *                         | max_height
     *                         | technology[] | port[] | band[]
     *
     * @return View The result view
     */
    public function showResult(Request $request)
    {
        // return $request->all();
        $technology = $request->input("technology");
        $port = $request->input("port");
        $band = $request->input("band");
        $antenna_per_sector = $request->input("antenna_per_sector");
        $max_height = $request->input("max_height");
        $antenna_preferred = $request->input("antenna_preferred");
        if (!isset($max_height)) {
            $max_height = PHP_INT_MAX;
        }
        if (!isset($antenna_preferred)) {
            $antenna_preferred = 1;
        }

        // testing custom solution against _isValidSetAntenna
        // $totalNbPorts = array_sum($port);
        // $test =  [Antennas::find(93), Antennas::find(226)];
        // return var_dump(
        //     AnalyserController::_isValidSetAntenna(
        //         $test,
        //         $port,
        //         $band,
        //         $totalNbPorts
        //     )
        // );




        // trying to compute solution such all ports in all antennas
        // are filled with no waste
        $totalNbPorts = array_sum($port);
        $AntennaSolution = AnalyserController::_solutionCalculator(
            $totalNbPorts,
            $port,
            $band,
            $max_height,
            $antenna_per_sector,
            $antenna_preferred
        );

        // TODO debug
        // return $AntennaSolution;
        // return AnalyserController::$debug;

        // if no solution found trying to found solution
        // where waste is allowed to be 2 ports
        if (count($AntennaSolution) == 0) {
            $totalNbPorts += 2;
            $AntennaSolution = AnalyserController::_solutionCalculator(
                $totalNbPorts,
                $port,
                $band,
                $max_height,
                $antenna_per_sector,
                $antenna_preferred
            );
        }

        return view("analyser\\result")
            ->with("AntennaSolution", $AntennaSolution)
            // to make able to return the old view
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("max_height", $max_height)
            ->with("technology", $technology)
            ->with("band", $band)
            ->with("port", $port);
    }

    /**
     * Solution Calculator
     *
     * Given all input form and the sum of ports number of all antennas
     * in solution set, it return (multi-dimensional array) of antennas
     *
     * @param int   $totalNbPorts       The sum of ports in accepted solution
     * @param array $port               Input Form: all ports
     * @param array $band               Input Form: all bands
     * @param int   $max_height         The maximum accepted height antennas
     *                                  (with error of 10)
     * @param int   $antenna_per_sector allowed nb of antenna in solution set
     * @param int   $antenna_preferred  priority to this nb and down
     *
     * @return array (multi-dimensional array) of antennas solution
     */
    private static function _solutionCalculator(
        $totalNbPorts,
        $port,
        $band,
        $max_height,
        $antenna_per_sector,
        $antenna_preferred
    ) {
        $allAntennas = Antennas::where(
            [
                ['Total #RF ports', "<=", $totalNbPorts],
                ['Height (mm)', "<=",  $max_height + 10]
            ]
        )
            ->select(
                "antennaId",
                "Total #RF ports",
                "Height (mm)",
                // later for display
                "Link to product datasheet"
            )
            ->get();

        // group all antenna by ports number so for example key 2 point to all
        // antennas that have total ports as 2
        $AntennaGroupedByPortsNb = array();
        // initializing empty arrays
        $maxPorts = Antennas::max('Total #RF ports');
        for ($i = 2; $i <= $maxPorts; $i += 2) {
            $AntennaGroupedByPortsNb[$i] = array();
        }
        foreach ($allAntennas as $key => $value) {
            // if (!isset($AntennaGroupedByPortsNb[$value->portsNb()])) {
            //     $AntennaGroupedByPortsNb[$value->portsNb()] = array();
            // }
            array_push($AntennaGroupedByPortsNb[$value->portsNb()], $value);
        }
        // return var_dump($AntennaGroupedByPortsNb[2][1]);
        // return $AntennaGroupedByPortsNb[2];
        $AntennaSolution = array();
        $AntennaMaxOrder = array();
        $AntennaMaxOrder[] = $antenna_preferred;
        for ($i = 1; $i <= $antenna_per_sector; $i++) {
            if ($i != $AntennaMaxOrder) {
                $AntennaMaxOrder[] = $i;
            }
        }
        // start from preferred antenna number then loop over until solution found
        // example max is 3, preferred is 2, start with 2 _if no solution found
        // go to 1, if no solution go to 0 then in loop in if it go to 3 .. then out
        // in this mode decreasing when not found is less costly to the system
        // otherwise to increasing mode set up:
        // set instead of -- to ++ before % and set if condition to 1
        foreach ($AntennaMaxOrder as $key => $maxAntenna) {
            // forming possible combination based on number of ports
            // each of these combination represent a set of antennas such that
            // their total number of ports is equals to total number of ports of
            // technologies we have which is stored in $totalNbPorts
            $possibleCombination = AnalyserController::_combinationGenerator(
                $AntennaGroupedByPortsNb,
                $maxAntenna,
                $totalNbPorts
            );

            // in here could get out of memory exception
            // the new approach is to test validity set at forming
            // then save only in case if it was true
            // HTTP ERROR 500 in case of maxAntenna is 3
            // [Imgur](https://i.imgur.com/nWPQ531.png)
            // TODO debug
            // return count($possibleCombination);

            // testing possible combination and adding to solution
            foreach ($possibleCombination as $key => $value) {
                if (AnalyserController::_isValidSetAntenna(
                    $value,
                    $port,
                    $band,
                    $totalNbPorts
                )) {
                    $AntennaSolution[] = $value;
                }
            }
            if (count($AntennaSolution) > 0) {
                break;
            }
        }
        return $AntennaSolution;
    }
    /**
     * Antennas[ ] tester vs Technologies[ ]
     *
     * Given array of Antennas, and array of system technology (ports[]+bands[])
     * Test if every system do feet somewhere in any antennas.
     *
     * @param array $AntennaSet   All antenna to test against
     * @param array $port         All ports of technologies in same order with $band
     * @param array $band         All bands of technologies in same order with $port
     * @param int   $totalNbPorts The total number of ports of all system
     *                            It is equal to array_sum($port).. sent with
     *                            parameter for performance reason
     *
     * @return bool return wherever this set meet condition or not
     */
    private static function _isValidSetAntenna(
        &$AntennaSet,
        &$port,
        &$band,
        $totalNbPorts
    ) {
        $allBands = array();
        foreach ($AntennaSet as $key => $value) {
            // https://stackoverflow.com/questions/4268871/php-append-one-array-to-another-not-array-push-or
            array_push($allBands, ...$value->Bands);
        }
        // https://stackoverflow.com/questions/2699086/how-to-sort-multi-dimensional-array-by-value
        // sorting bands in increasing order of total ports:
        // to keep as long as possible same ports bandwidth
        // together unused in antenna for the case that another
        // system techno may need them in same antenna example:
        // (2G, 4 ports, 900) and (2G, 2 ports, 900)
        usort(
            $allBands,
            function ($a, $b) {
                $retval = $a['totalPorts'] <=> $b['totalPorts'];
                if ($retval == 0) {
                    $retval = $a['min'] <=> $b['min'];
                    if ($retval == 0) {
                        $retval = $a['max'] <=> $b['max'];
                    }
                }
                return $retval;
            }
        );
        // backup total ports as they will get modified(minus when used)
        $backupTotalPorts = array();
        foreach ($allBands as $keyBand => $bandItem) {
            $backupTotalPorts[] = $bandItem->totalPorts;
        }
        // AnalyserController::$debug .= "new array ".implode(";", $backupTotalPorts);
        foreach ($port as $key => $valuePort) {
            $found = false;
            foreach ($allBands as $keyBand => $bandItem) {
                if (
                    $band[$key] >= $bandItem->min
                    && $band[$key] <= $bandItem->max
                    && $bandItem->totalPorts >= $valuePort
                ) {
                    $bandItem->totalPorts -= $valuePort;
                    $totalNbPorts -= $valuePort;
                    // if ($bandItem->totalPorts == 0) {
                    //     // for a faster loop in future
                    //     // https://stackoverflow.com/questions/2304570/how-to-delete-object-from-array-inside-foreach-loop
                    //     unset($allBands[$keyBand]);
                    // }
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                // for sure a false return
                // because totalNbPorts != 0
                break;
            }
        }
        // restore total ports
        $i = 0;
        foreach ($allBands as $keyBand => $bandItem) {
            $bandItem->totalPorts = $backupTotalPorts[$i++];
        }

        if ($totalNbPorts == 0) {
            return true;
        }
        return false;
    }

    /**
     * Generator Function
     *
     * Given array of Antennas source, and number of sum ports,
     * it return an array of antennas set (multi-dimensional array)
     * where each set have a total number of ports equal to given parameter
     *
     * @param array $AntennasGrouped  All antenna grouped in map by port number
     * @param int   $maxAntennaPerSet The length of set antenna to form
     * @param int   $sumPorts         The number of ports which the set
     *                                of antennas sum ports have
     *
     * @return array return multi-dimensional array set of antennas
     */
    private static function _combinationGenerator(
        &$AntennasGrouped,
        $maxAntennaPerSet,
        $sumPorts
    ) {
        if ($sumPorts == 0 || $maxAntennaPerSet == 0) {
            return array();
        }
        $AntennasCombination = array();
        if ($maxAntennaPerSet == 1) {
            if (isset($AntennasGrouped[$sumPorts])) {
                foreach ($AntennasGrouped[$sumPorts] as $key => $value) {
                    // [$value] is an array with single item
                    $AntennasCombination[] = [$value];
                }
            }
        } else {
            $toSkipRepeat = array();
            foreach ($AntennasGrouped as $key => $value) {
                // key is number of ports in antenna
                // value is the array of corresponding antenna
                // note if we have 10 ports as total
                // and combined 2 with 8 at first, should later to skip 8 since
                // it is already combined with 2 so we skip also any future key
                // if it is equal to any old $sumPorts - $key
                // so let's save them in toSkipRepeat this save half way
                if (
                    isset($AntennasGrouped[$key])
                    && count($AntennasGrouped[$key]) > 0
                    && !isset($toSkipRepeat[$key])
                ) {

                    $correspondingCombination
                        = AnalyserController::_combinationGenerator(
                            $AntennasGrouped,
                            $maxAntennaPerSet - 1,
                            $sumPorts - $key
                        );
                    $toSkipRepeat[$sumPorts - $key] = $sumPorts - $key;
                    if (count($correspondingCombination) > 0) {
                        // an stand for antenna
                        foreach ($AntennasGrouped[$key] as $anItemKey => $anItem) {
                            foreach ($correspondingCombination
                                as
                                $miniSetKey
                                => $miniSetValue) {
                                //     $miniSetKey[]=$anItem;
                                $AntennasCombination[]
                                    = array_merge([$anItem], $miniSetValue);
                                // = $miniSetKey;
                            }
                        }
                    }
                }
            }
        }
        return $AntennasCombination;
    }

    /**
     * Receive form information to analyse them and return result
     *
     * @param Request $request antenna_per_sector | technology[] | port[] | band[]
     *
     * @return View The result view
     */
    public function editForm(Request $request)
    {
        // about passing array as string value in get method
        // https://www.pontikis.net/tip/?id=11
        $technology = unserialize(base64_decode($request->input("technology")));
        $port = unserialize(base64_decode($request->input("port")));
        $band = unserialize(base64_decode($request->input("band")));
        $antenna_per_sector = $request->input("antenna_per_sector");
        $max_height = $request->input("max_height");
        // just to prettily look
        if ($max_height == PHP_INT_MAX) {
            $max_height = "";
        }
        // This return view with predefined column and stuff
        return view('welcome')
            ->with("bands", XgBands::getBands())
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("max_height", $max_height)
            ->with("technology", $technology)
            ->with("band", $band)
            ->with("port", $port);
    }
}
