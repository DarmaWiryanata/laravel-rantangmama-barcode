<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\RoleUser;
use App\User;

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
        if (RoleUser::firstRole(Auth::user()->id)->name == 'superadmin') {
            return redirect()->route('admin.home');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'admin') {
            return redirect()->route('admin.home');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'executive') {
            return redirect()->route('executive.home');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'supervisor') {
            return redirect()->route('supervisor.home');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'marketing') {
            return redirect()->route('marketing.home');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'production') {
            return redirect()->route('production.produksi');
        } elseif (RoleUser::firstRole(Auth::user()->id)->name == 'shipping') {
            return redirect()->route('shipping.index');
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

    public function editPassword()
    {
        return view('auth.passwords.edit');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password'  => ['required', 'string', 'min:8', 'confirmed']
        ]);

        User::updatePassword(Auth::user()->id, $request->password);

        return back()->with('success', 'Password berhasil diubah');
    }
}
