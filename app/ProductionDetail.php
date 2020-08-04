<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProductionDetail extends Model
{
    protected $table = 'production_details';
    protected $fillable = ['production_id', 'member_id', 'code', 'production_scan', 'admin_scan', 'shipping_scan', 'status'];

    static function adminPenyimpananUpdate($code)
    {
        ProductionDetail::where('code', $code)->update(['admin_scan' => Carbon::now()]);
    }

    static function expiredProducts()
    {
        return ProductionDetail::select('production_details.id', 'production_details.code', 'products.name', 'productions.expire_date')
                                        ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                        ->leftJoin('products', 'productions.product_id', 'products.id')
                                        ->whereNull('production_details.shipping_scan')
                                        ->whereRaw('(productions.expire_date - CURDATE()) <= 7')
                                        ->get();
    }

    static function firstProductionDetailByCode($code)
    {
        return ProductionDetail::select('production_details.code', 'productions.expire_date')
                                ->join('productions', 'production_details.production_id', 'productions.id')
                                ->where('code', $code)
                                ->first();
    }

    static function firstProductIdByCode($code)
    {
        $data = ProductionDetail::select('productions.product_id as product_id')
                                ->join('productions', 'production_details.production_id', 'productions.id')
                                ->where('production_details.code', $code)
                                ->first();

        return $data->product_id;
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

    static function getProductionDetailByReturnRusak()
    {
        return ProductionDetail::selectRaw('`production_details`.`id` as `id`, `production_details`.`code` as `code`, `products`.`name` as `name`, IF(`production_details`.`status` = 3, "Retur", "Rusak") as `status`')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('status', 3)
                                ->orWhere('status', 4)
                                ->get();
    }

    static function getProductionDetailByReturnRusakWithDate($awal, $akhir)
    {
        return ProductionDetail::selectRaw('`production_details`.`id` as `id`, `production_details`.`code` as `code`, `products`.`name` as `name`, IF(`production_details`.`status` = 3, "Retur", "Rusak") as `status`, `productions`.`created_at` as `created_at`')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('status', 3)
                                ->where('productions.created_at', '>=', $awal)
                                ->where('productions.created_at', '<=', $akhir)
                                ->orWhere('status', 4)
                                ->where('productions.created_at', '>=', $awal)
                                ->where('productions.created_at', '<=', $akhir)
                                ->toSql();

                                // select `production_details`.`id` as `id`, `production_details`.`code` as `code`, `products`.`name` as `name`, IF(`production_details`.`status` = 3, "Retur", "Rusak") as `status`, `productions`.`created_at` as `created_at` from `production_details` left join `productions` on `production_details`.`production_id` = `productions`.`id` left join `products` on `productions`.`product_id` = `products`.`id` where `production_details`.`status` = '3' and `productions`.`created_at` >= '2020-08-04' and `productions`.`created_at` <= '2020-08-20' or `status` = '4' and `productions`.`created_at` >= '2020-08-04' and `productions`.`created_at` <= '2020-08-20'
    }

    static function getProductionDetailByAdminScan()
    {
        return ProductionDetail::select('production_details.id as id', 'production_details.code as code', 'products.name as name', 'production_details.admin_scan as scan_date')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->orderByDesc('production_details.admin_scan')
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

    static function getProductionDetailByReturnStatus()
    {
        return ProductionDetail::select('production_details.id as id', 'production_details.code as code', 'products.name as name', 'members.name as member', 'production_details.shipping_scan as scan_date')
                                ->leftJoin('members', 'production_details.member_id', 'members.id')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->orderByDesc('production_details.shipping_scan')
                                ->where('production_details.status', 3)
                                ->get();
    }

    static function productionUpdate($code)
    {
        ProductionDetail::where('code', $code)->update(['production_scan' => Carbon::now()]);
    }
    
    static function returnUpdate($request)
    {
        ProductionDetail::where('code', $request->barcode)->update(['status' => 3]);
    }

    static function rusakUpdate($request)
    {
        ProductionDetail::where('code', $request->barcode)->update(['status' => $request->status]);
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
        return Str::random(5);
    }
}