<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductionDetail;
use Illuminate\Http\Request;

class PenyimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionDetail = ProductionDetail::getProductionDetailByAdminScan();

        return view('admin.penyimpanan', compact('productionDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = ProductionDetail::firstProductionDetailByCode($request->barcode);

        if ($product !== NULL) {
            if ($product->production_scan !== NULL) {
                if ($product->admin_scan == NULL) {
                    ProductionDetail::adminPenyimpananUpdate($request->barcode);
                    return back()->with('success', 'Produk '.$request->barcode.' berhasil diperbaharui');
                } else {
                    return back()->with('danger', 'Produk telah melalui scan admin');
                }
            } else {
                return back()->with('danger', 'Produk belum melalui scan produksi');
            }
        } else {
            return back()->with('danger', 'Produk tidak ditemukan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductionDetail  $productionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionDetail $productionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductionDetail  $productionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionDetail $productionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductionDetail  $productionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionDetail $productionDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductionDetail  $productionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionDetail $productionDetail)
    {
        //
    }
}
