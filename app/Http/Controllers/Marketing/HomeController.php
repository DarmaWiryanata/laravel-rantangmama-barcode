<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ProductionDetail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:marketing');
    }

    public function index()
    {
        $products = ProductionDetail::expiredProducts();

        return view('marketing.home', compact('products'));
    }

    public function produk()
    {
        return view('marketing.produk');
    }
}
