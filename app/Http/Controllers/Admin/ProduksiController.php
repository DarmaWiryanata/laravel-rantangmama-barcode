<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

use App\Product;
use App\Production;
use App\ProductionDetail;

class ProduksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|production|superadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('name')->get();
        $production = Production::getProduction();
        $delete = 'admin.produksi.destroy';

        return view('admin.produksi', compact('delete', 'product', 'production'));
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
            'price' => 'required',
            'stock' => 'required'
        ]);
        // return Production::randomNumber(10);
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
    public function show($id)
    {
        return json_encode(Product::firstProduct($id));
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
    public function destroy($id)
    {
        $data = Production::findOrFail($id);

        Production::destroyProduksi($id);
        ProductionDetail::destroyProductionDetail($id);
        Product::decrementStock($id, $data->qty);

        return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil dihapus');
    }

    public function singleBarcode()
    {
        return view('production.single-barcode.index');
    }

    public function printBarcode($id)
    {
        $productionDetail = ProductionDetail::getProductionDetailByProductionId($id);

        $pdf = PDF::loadView('production.print', compact('productionDetail'));
        return view('production.print', compact('productionDetail'));
        // return $pdf->download('invoice.pdf');
    }

    public function scanProdukRusak()
    {
        $productionDetail = ProductionDetail::getProductionDetailByReturnRusak();

        return view('admin.produk-rusak', compact('productionDetail'));
    }
    
    public function rusakUpdate(Request $request)
    {
        if (ProductionDetail::firstProductionDetailByCode($request->barcode) !== NULL) {
            if ($request->status !== 3 || $request->status !== 4) {
                ProductionDetail::rusakUpdate($request);
                if ($request->status == 3) {
                    return back()->with([
                        'success' => 'Produk '.$request->barcode.' berhasil dikembalikan dengan status "Retur"',
                        'status' => $request->status
                    ]);
                } else if ($request->status == 4) {
                    return back()->with([
                        'success' => 'Produk '.$request->barcode.' berhasil dikembalikan dengan status "Rusak"',
                        'status' => $request->status
                    ]);
                }  
            } else {
                return back()->with('danger', 'Produk telah melalui scan retur/rusak');
            }
        } else {
            return back()->with('danger', 'Produk tidak ditemukan');
        }
    }
}
