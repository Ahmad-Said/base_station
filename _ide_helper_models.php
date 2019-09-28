<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Antennas
 *
 * @property int $id
 * @property string $model_nb
 * @property int $total_nb_ports
 * @property int $ports_lt_1GH
 * @property int $ports_btw_1_3GH
 * @property int $ports_bt_3GH
 * @property int $height_mm
 * @property string $link_online
 * @property float $msp_usd
 * @property array $bands
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereHeightMm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereLinkOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereModelNb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereMspUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas wherePortsBt3GH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas wherePortsBtw13GH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas wherePortsLt1GH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereTotalNbPorts($value)
 */
	class Antennas extends \Eloquent {}
}

namespace App{
/**
 * App\AntennasBands
 *
 * @property int $id
 * @property int $min
 * @property int $max
 * @property string $color
 * @property string $totalPorts
 * @property int $antennas_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereAntennasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereTotalPorts($value)
 */
	class AntennasBands extends \Eloquent {}
}

namespace App{
/**
 * App\AntennasBandsProvider
 *
 * @property int $bandId
 * @property int|null $min
 * @property int|null $max
 * @property string|null $color
 * @property int|null $antennaId
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBandsProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBandsProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBandsProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBandsProvider whereAntennaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBandsProvider whereBandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBandsProvider whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBandsProvider whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBandsProvider whereMin($value)
 */
	class AntennasBandsProvider extends \Eloquent {}
}

namespace App{
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
 * 16 -> Internal Duplexing : text
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
 *
 * @property int $antennaId
 * @property string|null $model number
 * @property string|null $Total #RF ports
 * @property string|null $#ports (<1GHz)
 * @property string|null $#ports (1-3GHz)
 * @property string|null $#ports (>3GHz )
 * @property string|null $Number of Calibration ports
 * @property int|null $Product Family
 * @property int|null $Antenna Type
 * @property string|null $Short description
 * @property string|null $Gain (<1GHz) [dBi]
 * @property string|null $Gain (1-3GHz) [dBi]
 * @property string|null $Gain (>3GHz) [dBi]
 * @property string|null $Typical HBW @3dB [deg]
 * @property string|null $Polarization
 * @property string|null $Internal Diplexing
 * @property string|null $Antenna size category [m]
 * @property string|null $Connectors type
 * @property string|null $Electrical Tilt
 * @property string|null $Tilt range [deg]
 * @property string|null $RET Position
 * @property string|null $RET family
 * @property string|null $Number of Columns (<1GHz)
 * @property string|null $Number of Columns (1-3GHz)
 * @property string|null $Number of Columns (>3GHz)
 * @property string|null $height_mm
 * @property string|null $Antenna Width (mm)
 * @property string|null $Antenna Depth (mm)
 * @property string|null $Antenna Weight [Kg]
 * @property string|null $Packing dimensions (HxWxD) [mm]
 * @property string|null $Shipping weight [Kg]
 * @property string|null $Country of Origin
 * @property string|null $Link to product datasheet
 * @property string|null $Comments
 * @property string|null $Product Status
 * @property string|null $Model Name (model number+specifics)
 * @property string|null $SAP Number
 * @property string|null $DR0 date
 * @property string|null $DR1 date
 * @property string|null $DR2 date
 * @property string|null $DR3 date
 * @property string|null $DR4 date
 * @property string|null $DR5 date
 * @property string|null $DR6 date
 * @property float|null $Standard Cost [RMB]
 * @property float|null $Standard Cost [USD]
 * @property float|null $Standard Cost [EUR]
 * @property float|null $MSP [RMB]
 * @property float|null $MSP [USD]
 * @property float|null $MSP [EUR]
 * @property float|null $SVM [%]
 * @property string|null $Key Changes
 * @property string|null $Date of last update
 * @property string|null $ODM or in-house
 * @property string|null $Internal comments
 * @property string|null $PLM Owner
 * @property string|null $Product Segment
 * @property string|null $Visible to PLM
 * @property string|null $Visible to B&P
 * @property string|null $Visible to Sales
 * @property string|null $Visible to Customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider where#ports(13GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider where#ports(<1GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider where#ports(>3GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereAntennaDepth(mm)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereAntennaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereAntennaSizeCategory[m]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereAntennaType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereAntennaWeight[Kg]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereAntennaWidth(mm)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereConnectorsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereCountryOfOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereDR0Date($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereDR1Date($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereDR2Date($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereDR3Date($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereDR4Date($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereDR5Date($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereDR6Date($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereDateOfLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereElectricalTilt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereGain(13GHz)[dBi]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereGain(<1GHz)[dBi]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereGain(>3GHz)[dBi]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereHeightMm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereInternalComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereInternalDiplexing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereKeyChanges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereLinkToProductDatasheet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereMSP[EUR]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereMSP[RMB]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereMSP[USD]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereModelName(modelNumber+specifics)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereModelNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereNumberOfCalibrationPorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereNumberOfColumns(13GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereNumberOfColumns(<1GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereNumberOfColumns(>3GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereODMOrInHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider wherePLMOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider wherePackingDimensions(HxWxD)[mm]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider wherePolarization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereProductFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereProductSegment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereProductStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereRETFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereRETPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereSAPNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereSVM[%]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereShippingWeight[Kg]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereStandardCost[EUR]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereStandardCost[RMB]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereStandardCost[USD]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereTiltRange[deg]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereTotal#RFPorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereTypicalHBW@3dB[deg]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereVisibleToB&P($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereVisibleToCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereVisibleToPLM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasProvider whereVisibleToSales($value)
 */
	class AntennasProvider extends \Eloquent {}
}

namespace App{
/**
 * App\CachedResult
 *
 * @property string $query_form
 * @property string $response_ids
 * @property int $sum_ports
 * @property int $state_finish
 * @property int $antennas_count
 * @property int $combination_nb
 * @property int $solution_count
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereAntennasCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereCombinationNb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereQueryForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereResponseIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereSolutionCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereStateFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereSumPorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereUpdatedAt($value)
 */
	class CachedResult extends \Eloquent {}
}

namespace App{
/**
 * App\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $cover_image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App{
/**
 * App\SettingWebLara
 *
 * @property int $id
 * @property string $setting_name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SettingWebLara newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SettingWebLara newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SettingWebLara query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SettingWebLara whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SettingWebLara whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SettingWebLara whereSettingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SettingWebLara whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SettingWebLara whereValue($value)
 */
	class SettingWebLara extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $is_activated
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $organization
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsActivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\XgBands
 *
 * @property int $id
 * @property int $xg
 * @property int $minFreq
 * @property int $maxFreq
 * @property string $symbol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereMaxFreq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereMinFreq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereXg($value)
 */
	class XgBands extends \Eloquent {}
}

