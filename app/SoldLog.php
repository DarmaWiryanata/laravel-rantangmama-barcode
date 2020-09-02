<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldLog extends Model
{
    protected $table = 'sold_logs';
    protected $fillable = ['member_id', 'shipping_number', 'qty'];

    static function shippingToSoldLog($memberId, $shippingNumber)
    {
        SoldLog::create([
            'member_id'         => $memberId,
            'shipping_number'   => $shippingNumber,
            'qty'               => 1
        ]);
    }

    static function consignmentToSoldLog($request)
    {

    }
}
