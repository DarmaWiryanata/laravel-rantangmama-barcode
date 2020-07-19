<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:production');
    }

    public function index()
    {
        return view('production.produksi');
    }
    
    public function store(Request $request)
    {
        return back()->with('success', 'Produk '.$request->barcode.' berhasil diperbaharui');
    }

    public function validasi()
    {
        return view('production.validasi');
    }
}
