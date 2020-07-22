<?php

namespace App\Http\Controllers\Shipping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Member;
use App\ProductionDetail;

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
            ProductionDetail::shippingUpdate($request);
            return back()->with([
                'success' => 'success',
                'barcode' => $request->barcode,
                'tujuan' => $request->tujuan
            ]);
        } else {
            return back()->with('danger', 'Produk tidak ditemukan');
        }
    }
}
