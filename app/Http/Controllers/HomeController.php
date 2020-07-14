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
        if (RoleUser::getRole()->name == 'admin') {
            return redirect()->route('admin.home');
        } elseif (RoleUser::getRole()->name == 'executive') {
            return redirect()->route('executive.home');
        } elseif (RoleUser::getRole()->name == 'supervisor') {
            return redirect()->route('supervisor.home');
        } elseif (RoleUser::getRole()->name == 'marketing') {
            return redirect()->route('marketing.home');
        } elseif (RoleUser::getRole()->name == 'production') {
            return redirect()->route('production.home');
        } elseif (RoleUser::getRole()->name == 'shipping') {
            return redirect()->route('shipping.home');
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
