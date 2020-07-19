<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\RoleUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (RoleUser::firstRole(Auth::user()->id)->name == 'admin') {
            return redirect()->route('admin.home');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'executive') {
            return redirect()->route('executive.home');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'supervisor') {
            return redirect()->route('supervisor.home');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'marketing') {
            return redirect()->route('marketing.produk');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == '`production`') {
            return redirect()->route('production.produksi');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'shipping') {
            return redirect()->route('pengiriman.index');
        }
    }

    public function checkCode($id)
    {
        return view('checkcode');
    }

    public function codeError()
    {
        return view('checkcodeerror');
    }
}
