<?php

namespace App\Http\Controllers\Executive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ProductionDetail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:executive');
    }

    public function index()
    {
        return view('executive.home');
    }

    public function showdata(Request $request)
    {
        return $productionDetail = ProductionDetail::getProductionDetailByReturnRusakWithDate($request->awal, $request->akhir);

        return view('executive.laporandata', compact('productionDetail'));
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
