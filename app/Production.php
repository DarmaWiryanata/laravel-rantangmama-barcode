<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'productions';
    protected $fillable = ['product_id', 'member_id', 'code', 'production_scan', 'shipping_scan', 'expire_date', 'status'];
}
