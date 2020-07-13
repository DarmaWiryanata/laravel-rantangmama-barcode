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
            return "admin dong";
            // return redirect('/admin');
        } elseif (RoleUser::getRole()->name == 'pimpinan') {
            return redirect('/pimpinan');
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
