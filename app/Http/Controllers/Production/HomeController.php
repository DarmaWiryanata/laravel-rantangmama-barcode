<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

use App\Product;
use App\Production;
use App\ProductionDetail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:production|superadmin');
    }

    public function index()
    {
        $product = Product::orderBy('name')->get();
        $production = Production::getProduction();
        $delete = 'produksi.produksi.destroy';
        
        return view('admin.produksi', compact('delete', 'product', 'production'));
    }
    
    public function production(Request $request)
    {
        $product = ProductionDetail::firstProductionDetailByCode($request->barcode);
        
        if ($product !== NULL) {            
            if ($product->production_scan == NULL) {
                ProductionDetail::productionUpdate($request->barcode);
                return back()->with('success', 'Produk '.$request->barcode.' berhasil diperbaharui');
            } else {
                return back()->with('danger', 'Produk telah melalui scan produksi');
            }
        } else {
            return back()->with('danger', 'Produk tidak ditemukan');
        }
    }

    public function destroyProduction($id)
    {
        Production::destroyProduksi($id);
        ProductionDetail::destroyProductionDetail($id);

        return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil dihapus');
    }

    public function validasi()
    {
        $productionDetail = ProductionDetail::getProductionDetailByProductionScan();

        return view('production.validasi', compact('productionDetail'));
    }

    public function singleBarcode()
    {
        return view('production.single-barcode.index');
    }

    public function printBarcode(Request $request)
    {
        $productionDetail = ProductionDetail::firstProductionDetailByCode($request->barcode);
        if ($productionDetail) {
            $pdf = PDF::loadView('production.single-barcode.print', compact('productionDetail'));
            return view('production.single-barcode.print', compact('productionDetail'));
        } else {
            return back()->with('danger', 'Data produksi tidak ditemukan');
        }
    }

    public function show($id)
    {
        return json_encode(Product::firstProduct($id));
    }

    public function cetak()
    {
        $id = 10;
        $productionDetail = ProductionDetail::getProductionDetailByProductionScan();
        $productionDetail1 = "";

        return view('executive.laporandata', compact('productionDetail', 'productionDetail1', 'id'));
    }
}
