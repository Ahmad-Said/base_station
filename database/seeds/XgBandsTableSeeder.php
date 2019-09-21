<?php

use App\XgBands;
use Illuminate\Database\Seeder;

class XgBandsTableSeeder extends Seeder
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

        /**
         * Database `rfsantennas`
         */

        /* `rfsantennas`.`xg_bands` */
        $xg_bands = array(
            array('xg' => '0', 'bands' => '5000', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '4200', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '900', 'symbol' => 'GSM 900'), // pointing to 2g example
            array('xg' => '0', 'bands' => '2100', 'symbol' => 'UMTS 2100'), // pointing to 3g example
            array('xg' => '0', 'bands' => '700', 'symbol' => 'L700(28)'), // pointing to 4g example
            array('xg' => '0', 'bands' => '5000', 'symbol' => 'IoT 5000'), // pointing to 5g example
            array('xg' => '0', 'bands' => '3500', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '2550', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '2350', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '2100', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '1950', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '1900', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '1850', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '1800', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '1750', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '1700', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '1400', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '900', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '850', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '800', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '750', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '700', 'symbol' => 'D'),
            array('xg' => '0', 'bands' => '600', 'symbol' => 'D'),
            array('xg' => '2', 'bands' => '900', 'symbol' => 'GSM 900'),
            array('xg' => '2', 'bands' => '1800', 'symbol' => 'GSM 1800'),
            array('xg' => '3', 'bands' => '2100', 'symbol' => 'UMTS 2100'),
            array('xg' => '3', 'bands' => '900', 'symbol' => 'UMTS 900'),
            array('xg' => '4', 'bands' => '700', 'symbol' => 'LTE 700(28)'),
            array('xg' => '4', 'bands' => '1800', 'symbol' => 'L1800'),
            array('xg' => '4', 'bands' => '2600', 'symbol' => 'L2600'),
            array('xg' => '4', 'bands' => '800', 'symbol' => 'L800')
        );
        App\XgBands::insert($xg_bands);
    }
}
