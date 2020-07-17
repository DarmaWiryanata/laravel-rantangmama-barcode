<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:marketing');
    }

    public function index()
    {
        return view('marketing.home');
    }

    public function produk()
    {
        return view('marketing.produk');
    }
}
