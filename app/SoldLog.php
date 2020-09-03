<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldLog extends Model
{
    protected $table = 'sold_logs';
    protected $fillable = ['member_id', 'product_id', 'shipping_number', 'price', 'qty'];

    static function shippingToSoldLog($memberId, $shippingNumber)
    {
        SoldLog::create([
            'member_id'         => $memberId,
            'shipping_number'   => $shippingNumber,
            'qty'               => 1
        ]);
    }

    static function consignmentToSoldLog($key, $request)
    {
        if ($request['terjual'] != NULL) {
            SoldLog::create([
                'member_id'         => $request['member_id'],
                'product_id'        => $key,
                'shipping_number'   => $request['shipping_number'],
                'price'             => $request['price'],
                'qty'               => $request['terjual']
            ]);
        };
    }
}
