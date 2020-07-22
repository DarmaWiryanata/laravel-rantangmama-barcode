<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Product;
use App\Production;
use App\ProductionDetail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:production');
    }

    public function index()
    {
        $product = Product::orderBy('name')->get();
        $production = Production::getProduction();
        
        return view('admin.produksi', compact('product', 'production'));
    }
    
    public function production(Request $request)
    {
        if (ProductionDetail::firstProductionDetailByCode($request->barcode) !== NULL) {
            ProductionDetail::productionUpdate($request->barcode);
            return back()->with('success', 'Produk '.$request->barcode.' berhasil diperbaharui');
        } else {
            return back()->with('danger', 'Produk tidak ditemukan');
        }
    }

    public function validasi()
    {
        $productionDetail = ProductionDetail::getProductionDetailByProductionScan();

        return view('production.validasi', compact('productionDetail'));
    }
}
