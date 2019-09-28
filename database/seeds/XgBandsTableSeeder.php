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
            array('xg' => '0', 'minFreq' => '5000', 'maxFreq' => '5000', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '4200', 'maxFreq' => '4200', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '900',  'maxFreq' => '900', 'symbol' => 'GSM 900'), // pointing to 2g example
            array('xg' => '0', 'minFreq' => '2100', 'maxFreq' => '2100', 'symbol' => 'UMTS 2100'), // pointing to 3g example
            array('xg' => '0', 'minFreq' => '700',  'maxFreq' => '700', 'symbol' => 'L700(28)'), // pointing to 4g example
            array('xg' => '0', 'minFreq' => '5000', 'maxFreq' => '5000', 'symbol' => 'IoT 5000'), // pointing to 5g example
            array('xg' => '0', 'minFreq' => '3500', 'maxFreq' => '3500', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '2550', 'maxFreq' => '2550', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '2350', 'maxFreq' => '2350', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '2100', 'maxFreq' => '2100', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '1950', 'maxFreq' => '1950', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '1900', 'maxFreq' => '1900', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '1850', 'maxFreq' => '1850', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '1800', 'maxFreq' => '1800', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '1750', 'maxFreq' => '1750', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '1700', 'maxFreq' => '1700', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '1400', 'maxFreq' => '1400', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '900',  'maxFreq' => '900', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '850',  'maxFreq' => '850', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '800',  'maxFreq' => '800', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '750',  'maxFreq' => '750', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '700',  'maxFreq' => '700', 'symbol' => 'D'),
            array('xg' => '0', 'minFreq' => '600',  'maxFreq' => '600', 'symbol' => 'D'),
            array('xg' => '2', 'minFreq' => '900',  'maxFreq' => '900', 'symbol' => 'GSM 900'),
            array('xg' => '2', 'minFreq' => '1800', 'maxFreq' => '1800', 'symbol' => 'GSM 1800'),
            array('xg' => '3', 'minFreq' => '2100', 'maxFreq' => '2100', 'symbol' => 'UMTS 2100'),
            array('xg' => '3', 'minFreq' => '900',  'maxFreq' => '900', 'symbol' => 'UMTS 900'),
            array('xg' => '4', 'minFreq' => '700',  'maxFreq' => '700', 'symbol' => 'LTE 700(28)'),
            array('xg' => '4', 'minFreq' => '800',  'maxFreq' => '800', 'symbol' => 'LTE 800'),
            array('xg' => '4', 'minFreq' => '1800', 'maxFreq' => '1800', 'symbol' => 'LTE 1800'),
            array('xg' => '4', 'minFreq' => '2600', 'maxFreq' => '2600', 'symbol' => 'LTE 2600'),
        );
        App\XgBands::insert($xg_bands);
    }
}
