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
            $product = Product::firstProduct($request['product_id']);

            SoldLog::create([
                'member_id'         => $request['member_id'],
                'product_id'        => $key,
                'shipping_number'   => $request['shipping_number'],
                'price'             => $product->price,
                'qty'               => $request['terjual']
            ]);
        };
    }
    
    static function getSoldLogByConsignmentProductSoldWithMember($awal, $akhir)
    {
        return SoldLog::select('members.name as member', 'products.name as name', 'sold_logs.price as price', 'sold_logs.shipping_number as shipping_number', 'sold_logs.created_at as created_at')
                        ->selectRaw('SUM(sold_logs.qty) as qty, sold_logs.price * SUM(sold_logs.qty) as total')
                        ->groupBy('sold_logs.shipping_number')
                        ->groupBy('sold_logs.product_id')
                        ->groupBy('sold_logs.price')
                        ->leftJoin('members', 'sold_logs.member_id', 'members.id')
                        ->leftJoin('products', 'sold_logs.product_id', 'products.id')
                        ->whereBetween('sold_logs.created_at', [$awal." 00:00:00", $akhir." 23:59:59"])
                        ->get();
    }

    static function getSoldLogByProductSold($awal, $akhir)
    {
        return SoldLog::select('products.name as name', 'sold_logs.price as price', 'sold_logs.created_at as created_at')
                                ->selectRaw('SUM(*) as qty, sold_logs.price * SUM(*) as total')
                                ->groupBy('sold_logs.product_id')
                                ->groupBy('sold_logs.price')
                                ->leftJoin('products', 'sold_logs.product_id', 'products.id')
                                ->whereBetween('sold_logs.created_at', [$awal." 00:00:00", $akhir." 23:59:59"])
                                ->toSql();
    }
}
