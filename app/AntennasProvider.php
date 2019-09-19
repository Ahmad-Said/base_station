<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Antennas Provider
 *
 * This class table is located in (mysql2) another database than default used
 * in the project web, also to note that columns cannot be accessed by
 * their names as they change dynamically, so access them by index order.
 * use columnNamesHelper() as walk around to resolve the issue.
 * This structure is out of control of the writer of this website.
 * Mapping of index to column
 * 1 -> antennas ID : int(11)
 * 2 -> model number : text
 * 3 -> Total #RF ports : text
 * 4 -> #ports (<1GHz) : text
 * 5 -> #ports (1-3GHz) : text
 * 6 -> #ports (>3GHz ) : text
 * 7 -> Number of Calibration ports : text
 * 8 -> Product Family : int(11)
 * 9 -> Antenna Type : int(11)
 * 10 -> Short description : text
 * 11 -> Gain (<1GHz) [dBi] : text
 * 12 -> Gain (1-3GHz) [dBi] : text
 * 13 -> Gain (>3GHz) [dBi] : text
 * 14 -> Typical HBW @3dB [deg] : text
 * 15 -> Polarization : text
 * 16 -> Internal Diplexing : text
 * 17 -> Antenna size category [m] : text
 * 18 -> Connectors type : text
 * 19 -> Electrical Tilt : text
 * 20 -> Tilt range [deg] : text
 * 21 -> RET Position : text
 * 22 -> RET family : text
 * 23 -> Number of Columns (<1GHz) : text
 * 24 -> Number of Columns (1-3GHz) : text
 * 25 -> Number of Columns (>3GHz) : text
 * 26 -> Height (mm) : text
 * 27 -> Antenna Width (mm) : text
 * 28 -> Antenna Depth (mm) : text
 * 29 -> Antenna Weight [Kg] : text
 * 30 -> Packing dimensions (HxWxD) [mm] : text
 * 31 -> Shipping weight [Kg] : text
 * 32 -> Country of Origin : text
 * 33 -> Link to product datasheet : text
 * 34 -> Comments : text
 * 35 -> Product Status : text
 * 36 -> Model Name (model number+specifics) : text
 * 37 -> SAP Number : text
 * 38 -> DR0 date : date
 * 39 -> DR1 date : date
 * 40 -> DR2 date : date
 * 41 -> DR3 date : date
 * 42 -> DR4 date : date
 * 43 -> DR5 date : date
 * 44 -> DR6 date : date
 * 45 -> Standard Cost [RMB] : float
 * 46 -> Standard Cost [USD] : float
 * 47 -> Standard Cost [EUR] : float
 * 48 -> MSP [RMB] : float
 * 49 -> MSP [USD] : float
 * 50 -> MSP [EUR] : float
 * 51 -> SVM [%] : float
 * 52 -> Key Changes : text
 * 53 -> Date of last update : date
 * 54 -> ODM or in-house : text
 * 55 -> Internal comments : text
 * 56 -> PLM Owner : text
 * 57 -> Product Segment : text
 * 58 -> Visible to PLM : text
 * 59 -> Visible to B&P : text
 * 60 -> Visible to Sales : text
 * 61 -> Visible to Customer : text
 */
class AntennasProvider extends Model
{
    //
    protected $table = 'antennas';
    protected $primaryKey = 'antennaId';
    protected $connection = 'mysql2';
    // note to use specific db connection use DB::connection('mysql2')->whatever();

    /**
     * Column names
     *
     * Example of use: let's say we need to get model number
     * we check it's index in class definition doc which is of index 2
     * then simple query would be:
     *  - select (this_array_function)[2] from antennas
     *
     * @return array all column names
     */
    public static function columnNamesHelper()
    {
        $collectionNames = collect(
            DB::connection("mysql2")
                ->select('show full columns from antennas')
        )->pluck("Field");
        // to skip 0 indexing so antenna_id become at index 1...
        $collectionNames->prepend("0");
        return $collectionNames;
    }

    /**
     * Antennas Provider
     *
     * Copy all antennas data to default database with class associated as Antennas
     * Column needed index -> property  type
     * 2 ->  model_nb        text
     * 3 ->  total_nb_ports  int
     * 4 ->  ports_lt_1GH    int
     * 5 ->  ports_btw_1_3GH int
     * 6 ->  ports_bt_3GH    int
     * 26 -> height_mm       int
     * 33 -> link_online     text
     * 49 -> msp_usd         float
     *
     * @deprecated use provideDataToAntennasAndBands() instead
     *
     * @return void
     */
    public static function provideDataToAntennas()
    {
        Antennas::truncate();
        $ColumnNamesSrc = AntennasProvider::columnNamesHelper();
        $neededColumn = [
            1 => "id",
            2 => "model_nb",
            3 => "total_nb_ports",
            4 => "ports_lt_1GH",
            5 => "ports_btw_1_3GH",
            6 => "ports_bt_3GH",
            26 => "height_mm",
            33 => "link_online",
            49 => "msp_usd"

        ];
        foreach ($neededColumn as $key => $value) {
            $stringSelect[] = $ColumnNamesSrc[$key] . " as " . $value;
        }
        $allAntennasProvided = AntennasProvider::all($stringSelect);
        foreach ($allAntennasProvided as $key => &$value) {
            $value["height_mm"] = (int) $value["height_mm"];
        }
        Antennas::insert($allAntennasProvided->toArray());
    }

    /**
     * Antennas Provider
     *
     * Copy all antennas data with bands to default database
     *  with class associated as Antennas and AntennasBands
     * Column needed index -> property  type
     *
     * @return App\SettingWebLara CACHE_RESULT useful for timestamp ->update_at
     */
    public static function provideDataToAntennasAndBands()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AntennasBandsProvider::provideDataToAntennasBands();
        AntennasProvider::provideDataToAntennas();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $temp = SettingWebLara::whereSettingName(
            SettingWebLara::LAST_ANTENNA_DATA_PROVIDED
        )->first();
        $temp->value = !$temp->value;
        $temp->save();
        return $temp;
    }
}
