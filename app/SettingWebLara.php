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
}
