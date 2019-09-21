<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CachedResult extends Model
{
    //
    protected $primaryKey = 'query_form';

    /**
     * Unserialize stuff and load them
     *
     * @param array $AntennaSolutionIDS  set of set of ids solutions
     * @param array $allAntennasBandsMap map from id to antennas
     * @param array $AntennaSolution     the array to append them
     *
     * @return void
     */
    public function unserializeAndLoad(
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
