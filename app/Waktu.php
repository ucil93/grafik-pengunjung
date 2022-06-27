<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Waktu extends Eloquent
{
    // protected $connection = 'mongodb';
    // protected $collection = 'calculator';

    protected $fillable = ['hasiltime', 'name'];
}
