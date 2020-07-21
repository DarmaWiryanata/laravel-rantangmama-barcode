<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Production;
use App\ProductionDetail;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('name')->get();
        $production = Production::getProduction();
        // Production::all();

        return view('admin.produksi', compact('product', 'production'));
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
        $request->validate([
            'product_id' => 'required',
            'expire_date' => 'required',
            'stock' => 'required'
        ]);
        $production_id = Production::storeProduction($request);
        ProductionDetail::storeProductionDetail($request, $production_id->id);
        Product::incrementStock($request);

        return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function show(Produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Produksi $produksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);
        Member::updateMember($request, $id);

        return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produksi $produksi)
    {
        Member::destroyMember($id);

        return redirect()->route('admin.member.index')->with('success', 'Member berhasil dihapus');
    }
}
