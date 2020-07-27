<?php

namespace App\Http\Controllers\Executive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
