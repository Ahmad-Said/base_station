<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Antennas extends Model
{
    //
    protected $table = 'antennas';
    protected $primaryKey = 'antennaId';

    // https://stackoverflow.com/questions/17232714/add-a-custom-attribute-to-a-laravel-eloquent-model-on-load
    protected $appends = array('Bands');
    // the hole idea of creating $_Bands as attr is to save times
    // of keep accessing database with the method $this->bands();
    // also it give the access to make temporary operations on it
    // which is so useful in algorithm work
    private $_Bands;

    /**
     *  Https://laravel-news.com/eloquent-tips-tricks
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        // https://www.reddit.com/r/laravel/comments/4jkpfv/using_a_construct_method_in_a_model/
        // https://laravel.com/docs/master/eloquent#events
        // this simply create Bands Attr when antenna is retrieved
        self::retrieved(
            function ($model) {
                $model->_Bands = $model->bands();
            }
        );
    }

    /**
     * Default Constructor
     *
     * Nothing changed just a notice
     * [Check This Link](https://stackoverflow.com/questions/30502922/a-construct-on-an-eloquent-laravel-model)
     *
     * @param array $attributes default attr
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        // didin't work it return null value
        // as attributes aren't yet defined
        // $this->_Bands = $this->bands();
    }

    /**
     * Get Bands
     *
     * Check [This Link](https://laravel.com/docs/5.8/eloquent-mutators)
     *
     * @return array All bands
     */
    public function getBandsAttribute()
    {
        return $this->_Bands;
    }

    /**
     * Set Bands
     *
     * Check [This Link](https://laravel.com/docs/5.8/eloquent-mutators)
     *
     * @param array $value the new value
     *                     Note: this also work if any children is changed example
     *                     $this->Bands[0]->totalPorts-=2;
     *
     * @return array All bands
     */
    public function setBandsAttribute($value)
    {
        $this->_Bands = $value;
    }

    /**
     * A shortcuts to get ports number of antennas
     *
     * @return int number of ports
     */
    public function portsNb()
    {
        return $this->{'Total #RF ports'};
    }

    /**
     * A shortcuts to get ports number of antennas
     * Example of access: $antenna->bands()[0]->min;
     * notice that count($antenna->bands()) == $antenna->portsNb()
     *
     * @return AntennasBand the related band in database
     */
    public function bands()
    {
        // https://laravel.com/docs/5.8/eloquent-relationships#one-to-many
        // https://stackoverflow.com/questions/34571957/laravel-hasmany-method-not-working
        // group by equivalent using mysql: SELECT *,count(*) as total
        // FROM `bands` WHERE 1 GROUP BY `min`,`max`,`antennaId`
        // each row of bands table represent the information of 2 ports
        // in corresponding antenna
        return $this->hasMany('App\AntennasBands', 'antennaId')
            ->select('min', 'max', DB::raw('count(*)*2 as totalPorts'))
            ->groupBy('min', 'max', 'antennaId')
            ->get();
    }
}
