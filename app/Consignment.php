<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    protected $table = 'consignments';
    protected $fillable = ['member_id', 'product_id', 'qty'];

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
                            ->get();

        foreach ($data as $key => $value) {
            $data[$key]['items'] = Consignment::select('consignments.id', 'products.name', 'consignments.qty')
                                                ->join('products', 'consignments.product_id', 'products.id')
                                                ->where('consignments.qty', '>', 0)
                                                ->get();
        }

        return $data;
    }

    static function updateConsignment($member, $product)
    {
        Consignment::updateOrCreate([
            'member_id' => $member,
            'product_id' => $product
        ], [
            'member_id' => $member,
            'product_id' => $product
        ]);
    }
}
