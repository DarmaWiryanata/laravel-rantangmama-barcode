<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $table = 'reseller';

    protected $fillable = ['name', 'address'];
}
