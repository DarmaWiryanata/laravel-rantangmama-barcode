<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProductionDetail extends Model
{
    protected $table = 'production_details';
    protected $fillable = ['production_id', 'member_id', 'code', 'production_scan', 'admin_scan', 'shipping_scan', 'shipping_number', 'status', 'nb'];

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

    static function destroyProductionDetail($id)
    {
        ProductionDetail::where('production_id', $id)->delete();
    }

    static function firstProductionDetailByCode($code)
    {
        return ProductionDetail::select('production_details.code', 'productions.expire_date', 'production_details.production_scan', 'productions.batch', 'production_details.admin_scan', 'production_details.shipping_scan')
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
        return ProductionDetail::select('production_details.id as id', 'production_details.production_id as production_id', 'productions.expire_date as expire_date', 'production_details.code as code', 'productions.batch as batch')
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
        return ProductionDetail::selectRaw('`production_details`.`id` as `id`, `production_details`.`code` as `code`, `products`.`name` as `name`, IF(`production_details`.`status` = 3, "Retur", "Rusak") as `status`, `nb`, `production_details`.`updated_at` as `updated_at`')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('status', 3)
                                ->orWhere('status', 4)
                                ->get();
    }

    static function getProductionDetailByReturnRusakWithDate($awal, $akhir)
    {
        return ProductionDetail::selectRaw('`production_details`.`id` as `id`, `production_details`.`code` as `code`, `products`.`name` as `name`, IF(`production_details`.`status` = 3, "Retur", "Rusak") as `status`, `nb`')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('status', 3)
                                ->whereBetween('productions.created_at', [$awal." 00:00:00", $akhir." 23:59:59"])
                                ->orWhere('status', 4)
                                ->whereBetween('productions.created_at', [$awal." 00:00:00", $akhir." 23:59:59"])
                                ->get();
    }

    static function getProductionDetailByReturnTotalRusakWithDate($awal, $akhir)
    {
        return ProductionDetail::selectRaw('`products`.`name` as `name`, IF(`production_details`.`status` = 3, "Retur", "Rusak") as `status`, COUNT(*) as qty')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('production_details.status', 3)
                                ->whereBetween('production_details.updated_at', [$awal." 00:00:00", $akhir." 23:59:59"])
                                ->orWhere('production_details.status', 4)
                                ->whereBetween('production_details.updated_at', [$awal." 00:00:00", $akhir." 23:59:59"])
                                ->groupBy('products.name')
                                ->groupBy('status')
                                ->get();
    }

    static function getProductionDetailByMember($memberId)
    {

        return json_encode(ProductionDetail::select('products.name as name', 'production_details.code as code', 'productions.price as price', 'productions.created_at as created_at', 'productions.updated_at as updated_at')
                                ->selectRaw('count(products.name) as qty')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('production_details.member_id', $memberId)
                                ->groupBy('products.name')
                                ->get());
    }

    static function getProductionDetailByMemberToday($memberId)
    {
        return json_encode(ProductionDetail::select('products.name as name', 'production_details.code as code', 'productions.price as price', 'productions.created_at as created_at', 'productions.updated_at as updated_at')
                                ->selectRaw('count(products.name) as qty')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('production_details.member_id', $memberId)
                                ->whereRaw('production_details.updated_at LIKE "' . Carbon::now()->format('Y-m-d') . '%"')
                                ->groupBy('products.name')
                                ->get());
    }

    static function getProductionDetailByMemberCount($memberId)
    {

        return (ProductionDetail::select('products.name as name', 'production_details.code as code', 'productions.price as price', 'productions.created_at as created_at', 'productions.updated_at as updated_at')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('production_details.member_id', $memberId)
                                ->count());
    }

    static function getProductionDetailByMemberTodayCount($memberId)
    {
        return (ProductionDetail::select('products.name as name', 'production_details.code as code', 'productions.price as price', 'productions.created_at as created_at', 'productions.updated_at as updated_at')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('production_details.member_id', $memberId)
                                ->whereRaw('production_details.updated_at LIKE "' . Carbon::now()->format('Y-m-d') . '%"')
                                ->count());
    }

    static function getProductionDetailByProductSold($awal, $akhir)
    {
        return ProductionDetail::select('products.name as name', 'productions.price as price', 'productions.created_at as created_at')
                                ->selectRaw('COUNT(*) as qty, productions.price * COUNT(*) as total')
                                ->groupBy('productions.product_id')
                                ->groupBy('productions.price')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('production_details.status', 1)
                                ->whereBetween('productions.created_at', [$awal." 00:00:00", $akhir." 23:59:59"])
                                ->get();
    }

    static function getProductionDetailByProductSoldWithMember($awal, $akhir)
    {
        return ProductionDetail::select('members.name as member', 'products.name as name', 'productions.price as price', 'production_details.shipping_number as shipping_number', 'productions.created_at as created_at')
                                ->selectRaw('COUNT(*) as qty, productions.price * COUNT(*) as total')
                                ->groupBy('production_details.shipping_number')
                                ->groupBy('productions.product_id')
                                ->groupBy('productions.price')
                                ->leftJoin('members', 'production_details.member_id', 'members.id')
                                ->leftJoin('productions', 'production_details.production_id', 'productions.id')
                                ->leftJoin('products', 'productions.product_id', 'products.id')
                                ->where('production_details.status', 1)
                                ->whereBetween('production_details.shipping_scan', [$awal." 00:00:00", $akhir." 23:59:59"])
                                ->get();
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
        ProductionDetail::where('code', $request->barcode)->update([
            'shipping_scan'     => NULL,
            'shipping_number'   => NULL,
            'status'            => $request->status,
            'nb'                => $request->nb
        ]);
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

    static function storeShippingNumber($memberId, $barcode)
    {
        $data = ProductionDetail::where('member_id', $memberId)
                                ->whereNotNull('shipping_number')
                                ->whereRaw('updated_at LIKE "' . Carbon::now()->format('Y-m-d') . '%"')
                                ->latest('updated_at')
                                ->first();
        // return $data;

        if (isset($data)) {
            $abc = $data->shipping_number;                                
            // return '1';
            ProductionDetail::where('code', $barcode)->update(['shipping_number' => $abc]);
            // return ([$memberId, $barcode, 1]);
            // return '1';
        } else {
            $latest = ProductionDetail::max('shipping_number');
            
            if (isset($latest)) {
                // return '2';
                ProductionDetail::where('code', $barcode)->update(['shipping_number' => ++$latest]);
                // return ([$memberId, $barcode, 2]);
                // return '2';
            } else {
                // return '3';
                ProductionDetail::where('code', $barcode)->update(['shipping_number' => 1]);
                // return ([$memberId, $barcode, 3]);
                // return '3';
            }
        }

        return ProductionDetail::orderBy('shipping_scan', 'desc')->first();        
    }
    static function getProductionDetailKosong()
    {
        return json_encode([['name' => 'Kosong']]);
    }
    static function getTransaction()
    {
        return ProductionDetail::join('productions', 'production_details.production_id', 'productions.id')
                                ->join('products', 'productions.product_id', 'products.id')
                                ->join('members', 'production_details.member_id', 'members.id')
                                ->select('members.name as name', 'shipping_number', 'products.name as product_name', 'productions.price as price')
                                ->selectRaw('count(*) as jumlah')
                                ->groupBy('productions.product_id')
                                ->groupBy('member_id')
                                ->groupBy('productions.price')
                                ->groupBy('shipping_number')
                                ->get();
    }
    static function checkNull($id)
    {
        return ProductionDetail::where('production_id', $id)
                            ->whereNotNull('production_scan')
                            ->orWhereNotNull('status')
                            ->where('production_id', $id)
                            ->count();
    }
}