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
 * @property int $antennaId
 * @property string|null $xxx
 * @property int|null $Total #RF ports
 * @property string|null $Gain (dBi) (<1GHz)
 * @property string|null $Gain (dBi) (1-3GHz)
 * @property string|null $Gain (dBi) (>3GHz)
 * @property int|null $Product Family
 * @property int|null $Type
 * @property string|null $Number of Calibration ports
 * @property int|null $#ports (<1GHz)
 * @property int|null $#ports (1-3GHz)
 * @property int|null $#ports (>3GHz )
 * @property string|null $Internal Diplexing
 * @property string|null $Antenna size category [m]
 * @property string|null $Typical HBW @3dB [deg]
 * @property string|null $Tilt
 * @property string|null $Polarization
 * @property string|null $#columns (<1GHz)
 * @property string|null $#columns (1-3GHz)
 * @property string|null $#columns (>3GHz)
 * @property string|null $Tilt range [deg]
 * @property string|null $RET Position
 * @property string|null $RET family
 * @property int|null $Height (mm)
 * @property string|null $Width (mm)
 * @property string|null $Depth (mm)
 * @property string|null $Antenna Weight [Kg]
 * @property string|null $Connectors type
 * @property string|null $Short description
 * @property string|null $Packing dimentions (HxWxD)[mm]
 * @property string|null $Shipping weight [Kg]
 * @property string|null $Country of Origin
 * @property string|null $Link to product datasheet
 * @property string|null $comments
 * @property array $bands
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas where#columns(13GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas where#columns(<1GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas where#columns(>3GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas where#ports(13GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas where#ports(<1GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas where#ports(>3GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereAntennaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereAntennaSizeCategory[m]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereAntennaWeight[Kg]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereConnectorsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereCountryOfOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereDepth(mm)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereGain(dBi)(13GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereGain(dBi)(<1GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereGain(dBi)(>3GHz)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereHeight(mm)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereInternalDiplexing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereLinkToProductDatasheet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereNumberOfCalibrationPorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas wherePackingDimentions(HxWxD)[mm]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas wherePolarization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereProductFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereRETFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereRETPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereShippingWeight[Kg]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereTilt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereTiltRange[deg]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereTotal#RFPorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereTypicalHBW@3dB[deg]($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereWidth(mm)($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Antennas whereXxx($value)
 */
	class Antennas extends \Eloquent {}
}

namespace App{
/**
 * App\AntennasBands
 *
 * @property int $bandId
 * @property int|null $min
 * @property int|null $max
 * @property string|null $color
 * @property int|null $antennaId
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereAntennaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereBandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AntennasBands whereMin($value)
 */
	class AntennasBands extends \Eloquent {}
}

namespace App{
/**
 * App\CachedResult
 *
 * @property int $query_form
 * @property string $response_ids
 * @property int $sum_ports
 * @property mixed $state_finish
 * @property int $combination_nb
 * @property int $antennas_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereAntennasCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereCombinationNb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereQueryForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereResponseIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereStateFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CachedResult whereSumPorts($value)
 */
	class CachedResult extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property mixed $is_activated
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
 * @property int $bands
 * @property string $symbol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereBands($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\XgBands whereXg($value)
 */
	class XgBands extends \Eloquent {}
}

