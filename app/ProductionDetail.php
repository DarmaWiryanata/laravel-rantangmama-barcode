<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProductionDetail extends Model
{
    protected $table = 'production_details';
    protected $fillable = ['production_id', 'member_id', 'code', 'production_scan', 'shipping_scan', 'status'];

    static function firstProductionDetailByCode($code)
    {
        return ProductionDetail::where('code', $code)->first();
    }

    static function getProductionDetailByProductionId($id)
    {
        return ProductionDetail::select('production_details.id as id', 'production_details.production_id as production_id', 'productions.expire_date as expire_date', 'production_details.code as code')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->where('production_details.production_id', $id)
                                ->orderByDesc('production_details.production_scan')
                                ->get();
    }

    static function getProductionDetailByProductionScan()
    {
        return ProductionDetail::select('production_details.id as id', 'production_details.code as code', 'products.name as name', 'production_details.production_scan as scan_date')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->orderByDesc('production_details.production_scan')
                                ->get();
    }

    static function getProductionDetailByShippingScan()
    {
        return ProductionDetail::select('production_details.id as id', 'production_details.code as code', 'products.name as name', 'members.name as member', 'production_details.shipping_scan as scan_date')
                                ->leftJoin('members', 'production_details.member_id', 'members.id')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->orderByDesc('production_details.shipping_scan')
                                ->get();
    }

    static function productionUpdate($code)
    {
        ProductionDetail::where('code', $code)->update(['production_scan' => Carbon::now()]);
    }

    static function shippingUpdate($request)
    {
        ProductionDetail::where('code', $request->barcode)->update([
            'member_id'     => $request->tujuan,
            'shipping_scan' => Carbon::now(),
            'status'        => $request->status
        ]);
    }

    static function storeProductionDetail($request, $id)
    {
        for ($i=0; $i < $request->stock; $i++) { 
            $code = ProductionDetail::generateCode();
            ProductionDetail::create([
                'production_id' => $id,
                'code'          => $code,
            ]);
        }
    }

    static function generateCode()
    {
        return Str::random(10);
    }
}