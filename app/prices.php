<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prices extends Model
{
    //
    // Table name
    protected $table = 'prices';

    // primary key
    public $primaryKey = 'id';

    // foreign key
    public $antennasId = 'antennasId';

    // Timestamps
    public $timestamps = true;

}
