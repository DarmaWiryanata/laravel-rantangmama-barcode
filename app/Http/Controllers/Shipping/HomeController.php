<?php

namespace App\Http\Controllers\Shipping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Member;
use App\ProductionDetail;
use App\Consignment;
use App\Product;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:shipping');
    }

    public function index()
    {
        $member = Member::getMember();
        $productionDetail = ProductionDetail::getProductionDetailByShippingScan();

        return view('shipping.pengiriman', compact('member', 'productionDetail'));
    }
    
    public function shipping(Request $request)
    {
        $product = ProductionDetail::firstProductionDetailByCode($request->barcode);
        if ($product !== NULL) {
            if ($product->production_scan !== NULL) {
                ProductionDetail::shippingUpdate($request);
                if ($request->status == 2) {
                    $productId = ProductionDetail::firstProductIdByCode($request->barcode);
                                        
                    Consignment::updateConsignment($request->tujuan, $productId);
    
                    Consignment::increment('qty', 1, [
                        'member_id' => $request->tujuan,
                        'product_id' => $productId
                    ]);
                } else if ($request->status == 1) {
                    $productId = ProductionDetail::firstProductIdByCode($request->barcode);
                    $data = Product::whereId($productId)->first();

                    Product::where('id', $productId)->update([
                                'stock' => $data->stock - 1
                            ]);
                }
                return back()->with([
                    'success' => 'success',
                    'barcode' => $request->barcode,
                    'tujuan' => $request->tujuan
                ]);
            } else {
                return back()->with('danger', 'Produk belum melalui scan produksi');
            }
            
        } else {
            return back()->with('danger', 'Produk tidak ditemukan');
        }
    }

    public function show($id)
    {
        return Member::showMember($id);
    }

    public function retur()
    {
        $member = Member::getMember();
        $productionDetail = ProductionDetail::getProductionDetailByReturnStatus();

        return view('shipping.retur', compact('member', 'productionDetail'));
    }

    public function returUpdate(Request $request)
    {
        $product = ProductionDetail::firstProductionDetailByCode($request->barcode);

        if ($product !== NULL) {
            if ($product->production_scan !== NULL) {
                if ($product->shipping_scan !== NULL) {
                    ProductionDetail::returnUpdate($request);

                    return back()->with('success', 'Produk ' . $request->barcode . ' berhasil dikembalikan');
                } else {
                    return back()->with('danger', 'Produk belum melalui scan produksi');
                }
            } else {
                return back()->with('danger', 'Produk belum melalui scan produksi');
            }
        } else {
            return back()->with('danger', 'Produk tidak ditemukan');
        }
    }
}
