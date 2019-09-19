<?php

use Illuminate\Database\Seeder;

class SettingWebLaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        /**
         * Export to PHP Array plugin for PHPMyAdmin
         * @version 4.8.3
         */

        $initial_setting = array(
            array(
                'setting_name' => 'CACHE_RESULT', 'value' => 'true',
                "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()
            ),
            array(
                'setting_name' => 'LIMIT_ROW_PER_QUERY', 'value' => '50000',
                "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()
            ),
            array(
                'setting_name' => 'LAST_ANTENNA_DATA_PROVIDED', 'value' => '0',
                "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()
            )
        );
        App\SettingWebLara::insert($initial_setting);
    }
}
