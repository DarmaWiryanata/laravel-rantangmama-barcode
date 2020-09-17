<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|superadmin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::getProduct();

        return view('admin.produk', compact('product'));
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
            'name' => 'required',
            'price' => 'required'
        ]);
        Product::storeProduct($request);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $data = json_encode(Product::firstProduct($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request;
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required'
        ]);
        Product::updateProduct($request);

        return back()->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroyProduct($id);

        return back()->with('success', 'Produk berhasil dihapus');
    }
}
