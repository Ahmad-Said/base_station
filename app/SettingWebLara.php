<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class SettingWebLara extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting_name', 'value',
    ];

    /**
     * Setting web
     *
     * @return array all setting with key of name
     */
    public static function getAllSettings()
    {
        // DB::connection('mysql2')->table('Antennas')->
        $allSetting = SettingWebLara::all()
            // making it as map key id to antenna
            ->mapWithKeys(
                function ($item) {
                    return [$item->setting_name => $item];
                }
            );
        $cacheResultTableInfo = DB::select(
            "SHOW TABLE STATUS WHERE Name = 'cached_results'"
        )[0];
        /**
         * Rows -> number of rows
         * Data_length -> total length of table in bytes
         */
        $allSetting["cacheResultTableInfo"] = $cacheResultTableInfo;
        return $allSetting;
    }

    // check SettingWebLaraSeeder.php for initial values

    // true OR false
    const CACHE_RESULT = "CACHE_RESULT";

    // just check timestamps updated at
    const LAST_ANTENNA_DATA_PROVIDED = "LAST_ANTENNA_DATA_PROVIDED";

    // Used in analyser controller
    const LIMIT_SOLUTION_PER_PAGE_RESULT = "LIMIT_SOLUTION_PER_PAGE_RESULT";

    // Used in analyser controller
    const LIMIT_ROW_PER_QUERY = "LIMIT_ROW_PER_QUERY";

    // contain html of help page
    const HELP = "help";

    /**
     * Get cache result
     *
     * @return bool
     */
    public static function isCacheAllowed()
    {
        return SettingWebLara::whereSettingName(SettingWebLara::CACHE_RESULT)
            ->first()->value == "true";
    }

    /**
     * Set cache result
     *
     * @param bool $bool status of CacheAllowed
     *
     * @return App\SettingWebLara CACHE_RESULT
     */
    public static function setCacheAllowed(bool $bool = false)
    {
        $temp = SettingWebLara::whereSettingName(SettingWebLara::CACHE_RESULT)
            ->first();
        $temp->value = $bool;
        $temp->save();
        return $temp;
    }

    /**
     * Touch LAST_ANTENNA_DATA_PROVIDED Setting to current date
     *
     * @return App\SettingWebLara LAST_ANTENNA_DATA_PROVIDED
     *                            useful for timestamp ->update_at
     */
    public static function touchUpdatedAtProvider()
    {
        $temp = SettingWebLara::whereSettingName(
            SettingWebLara::LAST_ANTENNA_DATA_PROVIDED
        )
            ->first();
        $temp->value = !$temp->value; // just to update timeStamps
        $temp->save();
        return $temp;
    }

    /**
     * Touch LAST_ANTENNA_DATA_PROVIDED Setting to current date
     *
     * @return App\SettingWebLara LAST_ANTENNA_DATA_PROVIDED
     *                            useful for timestamp ->update_at
     */
    public static function getSolutionPerPageResult()
    {
        $temp = SettingWebLara::whereSettingName(
            SettingWebLara::LIMIT_SOLUTION_PER_PAGE_RESULT
        )
            ->first();
        return $temp->value;
    }

    /**
     * Touch LAST_ANTENNA_DATA_PROVIDED Setting to current date
     *
     * @param int $newSolutionPerPage Used for pagination where there is many results
     *
     * @return App\SettingWebLara LAST_ANTENNA_DATA_PROVIDED
     *                            useful for timestamp ->update_at
     */
    public static function setSolutionPerPageResult($newSolutionPerPage)
    {
        $temp = SettingWebLara::whereSettingName(
            SettingWebLara::LIMIT_SOLUTION_PER_PAGE_RESULT
        )
            ->first();
        $temp->value = $newSolutionPerPage;
        $temp->save();
        return $temp->value;
    }

    /**
     * Get LIMIT_ROW_PER_QUERY Setting
     *
     * @return App\SettingWebLara LIMIT_ROW_PER_QUERY
     */
    public static function getLimitRowPerQuery()
    {
        $temp = SettingWebLara::whereSettingName(
            SettingWebLara::LIMIT_ROW_PER_QUERY
        )
            ->first();
        return (int) $temp->value;
    }
    /**
     * Touch LAST_ANTENNA_DATA_PROVIDED Setting to current date
     *
     * @param int $limit new limit to set
     *
     * @return App\SettingWebLara LAST_ANTENNA_DATA_PROVIDED
     *                            useful for timestamp ->update_at
     */
    public static function setLimitRowPerQuery($limit = 50000)
    {
        $temp = SettingWebLara::whereSettingName("LIMIT_ROW_PER_QUERY")->get()[0];
        $temp->value = $limit;
        $temp->save();
        return $temp;
    }
}
