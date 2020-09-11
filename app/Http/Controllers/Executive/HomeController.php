<?php

namespace App\Http\Controllers\Executive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ProductionDetail;
use App\SoldLog;
use App\Product;
use App\Production;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:executive|admin');
    }

    public function index()
    {
        return view('executive.home');
    }

    public function showdata(Request $request)
    {
        $id = $request->id;
        $start = $request->awal;
        $end = $request->akhir;
        
        if ($id == 1) {
            $productionDetail = ProductionDetail::getProductionDetailByReturnRusakWithDate($request->awal, $request->akhir);
            $productionDetail1 = ProductionDetail::getProductionDetailByReturnTotalRusakWithDate($request->awal, $request->akhir);
        } else if ($id == 2) {
            $productionDetail = ProductionDetail::getProductionDetailByProductSoldWithMember($request->awal, $request->akhir);
            $productionDetail1 = "";
        } else if ($id == 3) {
            $productionDetail = ProductionDetail::getProductionDetailByProductSold($request->awal, $request->akhir);
            $productionDetail1 = "";
        } else if ($id == 4) {
            $productionDetail = SoldLog::getSoldLogByConsignmentProductSoldWithMember($request->awal, $request->akhir);
            $productionDetail1 = "";
        } else if ($id == 5) {
            $productionDetail = SoldLog::getSoldLogByProductSold($request->awal, $request->akhir);
            $productionDetail1 = "";
        } else if ($id == 6) {
            $productionDetail = Product::getProduct();
            $productionDetail1 = "";
        } else if ($id == 7) {
            $productionDetail = Production::getProductionByDate($request->awal);
            $productionDetail1 = "";
        }

        return view('executive.laporandata', compact('id', 'end', 'start', 'productionDetail', 'productionDetail1'));
    }

    public function show(Request $request)
    {
        $data = $request;
        return view('executive.laporan', compact('data'));
    }

    public function produk()
    {
        return view('executive.produk');
    }

    public function produksi()
    {
        return view('executive.produksi');
    }

    public function user()
    {
        return view('executive.user');
    }
}
