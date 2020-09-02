<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    protected $table = 'consignments';
    protected $fillable = ['member_id', 'shipping_number', 'product_id', 'qty'];

    static function firstConsignment($id)
    {
        return Consignment::select('consignments.id', 'products.name', 'consignments.qty', 'consignments.product_id')
                            ->join('products', 'consignments.product_id', 'products.id')
                            ->whereFirst('consignments.product_id', $id);
    }

    static function getConsignment()
    {
        return Consignment::select('consignments.id', 'members.name', 'consignments.member_id')
                            ->orderByDesc('consignments.qty')
                            ->distinct()
                            ->groupBy('consignments.member_id')
                            ->leftJoin('members', 'consignments.member_id', 'members.id')
                            ->where('consignments.qty', '>', 0)
                            ->get();
    }

    static function showConsignment($memberId)
    {
        $data = Consignment::select('consignments.id', 'members.name', 'consignments.member_id')
                            ->leftJoin('members', 'consignments.member_id', 'members.id')
                            ->where('consignments.member_id', $memberId)
                            ->groupBy('member_id')
                            ->get();

        foreach ($data as $key => $value) {
            $data[$key]['items'] = Consignment::select('consignments.id', 'products.name', 'consignments.qty', 'consignments.shipping_number')
                                                ->join('products', 'consignments.product_id', 'products.id')
                                                ->where('consignments.qty', '>', 0)
                                                ->get();
        }

        return $data;
    }

    static function updateConsignment($member, $product, $shipping_number)
    {
        // return $shipping_number;
        Consignment::updateOrCreate([
            'member_id' => $member,
            'product_id' => $product,
            'shipping_number' => $shipping_number
        ], [
            'member_id' => $member,
            'product_id' => $product,
            'shipping_number' => $shipping_number
        ]);

        $data = Consignment::where('member_id', $member)
                    ->where('product_id', $product)
                    ->where('shipping_number', $shipping_number)
                    ->first();
        
        Consignment::where('member_id', $member)
                    ->where('product_id', $product)
                    ->where('shipping_number', $shipping_number)
                    ->update([
                        'qty' => $data->qty + 1
                    ]);
    }

    // static function updateQty($member, $product, $shipping_number)
    // {
    //     Consignment::where('member_id', $member)
    // }
}
