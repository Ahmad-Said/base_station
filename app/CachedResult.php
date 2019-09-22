<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CachedResult extends Model
{
    //
    protected $primaryKey = 'query_form';
    // these values added because after var_dump() an instance of
    // this variable by default keyType is int and displaying it
    // make it as 0. !!
    public $incrementing = false;
    public $keyType = "string";
    /**
     * Attributes:
     * query_form
     * response_ids
     * sum_ports
     * state_finish
     * antennas_count  Number of total antennas when cache was done
     * combination_nb
     * solution_count
     * email
     * created_at
     * updated_at
     */

    /**
     * Cache result  if recently requested
     *
     * Given parameters by reference will be sorted in increasing order
     *  by technology ->  ports number -> bands frequency value
     *
     * @param array $technology         Input Form: all technology
     * @param array $port               Input Form: all ports
     * @param array $band               Input Form: all bands
     * @param int   $max_height         The maximum accepted height antennas
     *                                  (with error of 10)
     * @param int   $antenna_per_sector allowed nb of antenna in solution set
     * @param int   $antenna_preferred  priority to this nb and down
     * @param int   $generatedSerial    id referring to request will be generated
     *
     * @return array result Antenna solution
     */
    public static function cachedResult(
        &$technology,
        &$port,
        &$band,
        $max_height,
        $antenna_per_sector,
        $antenna_preferred,
        &$generatedSerial
    ) {
        $generatedSerial = CachedResult::generateSerialQueryId(
            $technology,
            $port,
            $band,
            $max_height,
            $antenna_per_sector,
            $antenna_preferred
        );
        return CachedResult::find($generatedSerial);
    }

    /**
     * Generate Unique serial query_form for each from
     *
     * Given parameters by reference will be sorted in increasing order
     *  by technology ->  ports number -> bands frequency value
     *
     * @param array $technology         Input Form: all technology
     * @param array $port               Input Form: all ports
     * @param array $band               Input Form: all bands
     * @param int   $max_height         The maximum accepted height antennas
     *                                  (with error of 10)
     * @param int   $antenna_per_sector allowed nb of antenna in solution set
     * @param int   $antenna_preferred  priority to this nb and down
     * @param int   $generatedSerial    id referring to request will be generated
     *
     * @return string generatedSerial
     */
    public static function generateSerialQueryId(
        &$technology,
        &$port,
        &$band,
        $max_height,
        $antenna_per_sector,
        $antenna_preferred,
        &$generatedSerial = ""
    ) {
        // sorting array to unify request
        foreach ($technology as $key => $value) {
            $systemG[] = [
                (int) $technology[$key], (int) $port[$key], (int) $band[$key]
            ];
        }
        usort(
            $systemG,
            function ($a, $b) {
                $retVal = $a[0] <=> $b[0];
                if ($retVal == 0) {
                    $retVal = $a[1] <=> $b[1];
                    if ($retVal == 0) {
                        $retVal = $a[2] <=> $b[2];
                    }
                }
                return $retVal;
            }
        );
        $colSystemG = collect($systemG);
        $technology = $colSystemG->pluck(0)->toArray();
        $port = $colSystemG->pluck(1)->toArray();
        $band = $colSystemG->pluck(2)->toArray();

        $systemG[] = $max_height;
        $systemG[] = $antenna_per_sector;
        $systemG[] = $antenna_preferred;
        // old implode way
        // $generatedSerial = implode(",", $technology) . ";" .
        //     implode(",", $port) . ";" . implode(",", $band) . ";" .
        //     $max_height . ";" . $antenna_per_sector
        //     . ";" . $antenna_preferred;
        $generatedSerial = serialize($systemG);
        return $generatedSerial;
    }

    /**
     * Generate Unique serial query_form for each from
     *
     * All given parameters will be filled
     *
     * @param array $technology         Input Form: all technology
     * @param array $port               Input Form: all ports
     * @param array $band               Input Form: all bands
     * @param int   $max_height         The maximum accepted height antennas
     *                                  (with error of 10)
     * @param int   $antenna_per_sector allowed nb of antenna in solution set
     * @param int   $antenna_preferred  priority to this nb and down
     *
     * @return void just fill given parameters
     */
    public function unserializeGeneratedSerial(
        &$technology,
        &$port,
        &$band,
        &$max_height,
        &$antenna_per_sector,
        &$antenna_preferred
    ) {
        // loading systemG
        $generatedSerial = $this->query_form;
        $systemG = unserialize($generatedSerial);

        $antenna_preferred = array_pop($systemG);
        $antenna_per_sector = array_pop($systemG);
        $max_height = array_pop($systemG);

        $technology = array_pluck($systemG, 0);
        $port = array_pluck($systemG, 1);
        $band = array_pluck($systemG, 2);
    }

    /**
     * Unserialize stuff and load them
     *
     * @param array $AntennaSolutionIDS  set of set of ids solutions
     * @param array $allAntennasBandsMap map from id to antennas
     * @param array $AntennaSolution     the array to append them
     *
     * @return void
     */
    public function unserializeAndLoadSolution(
        &$AntennaSolutionIDS,
        &$allAntennasBandsMap,
        &$AntennaSolution
    ) {
        $AntennaSolutionIDS = unserialize($this->response_ids);
        foreach ($AntennaSolutionIDS as $key => $setIDS) {
            $setAntenna = array();
            foreach ($setIDS as $key2 => $id) {
                $setAntenna[] = $allAntennasBandsMap[$id];
            }
            $AntennaSolution[] = $setAntenna;
        }
    }
}
