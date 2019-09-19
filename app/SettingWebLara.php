<?php

namespace App;

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
        return $allSetting;
    }

    // check SettingWebLaraSeeder.php for initial values

    // true OR false
    const CACHE_RESULT = "CACHE_RESULT";

    // just check timestamps updated at
    const LAST_ANTENNA_DATA_PROVIDED = "LAST_ANTENNA_DATA_PROVIDED";

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
        $temp->value = 1;
        $temp->save();
        return $temp;
    }
}
