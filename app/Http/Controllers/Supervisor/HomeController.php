<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:supervisor');
    }

    public function index()
    {
        return view('home');
    }

    public function produk()
    {
        return view('supervisor.produk');
    }
}
