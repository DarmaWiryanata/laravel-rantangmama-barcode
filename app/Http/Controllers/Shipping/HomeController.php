<?php

namespace App\Http\Controllers\Shipping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Member;
use App\ProductionDetail;
use App\Consignment;

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
        if (ProductionDetail::firstProductionDetailByCode($request->barcode) !== NULL) {
            if (ProductionDetail::firstProductionDetailByCode($request->production_scan)) {
                ProductionDetail::shippingUpdate($request);
                if ($request->status == 2) {
                    $productId = ProductionDetail::firstProductIdByCode($request->barcode);
                                        
                    Consignment::updateConsignment($request->tujuan, $productId);
    
                    Consignment::increment('qty', 1, [
                        'member_id' => $request->tujuan,
                        'product_id' => $productId
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
}
