<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Member;
use App\ProductionDetail;

class MemberController extends Controller
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
        $member = Member::all();

        return view('admin.member', compact('member'));
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
            'address' => 'required',
            'status' => 'required'
        ]);
        Member::storeMember($request);

        return redirect()->route('admin.member.index')->with('success', 'Member berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Member::showMember($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function memberSale($id)
    {
        if (ProductionDetail::getProductionDetailByMemberCount($id) > 0) {
            return ProductionDetail::getProductionDetailByMember($id);
        } else {
            return ProductionDetail::getProductionDetailKosong();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function memberSaleToday($id)
    {
        if (ProductionDetail::getProductionDetailByMemberTodayCount($id) > 0) {
            return ProductionDetail::getProductionDetailByMemberToday($id);
        } else {
            return ProductionDetail::getProductionDetailKosong();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);
        Member::updateMember($request);

        return back()->with('success', 'Member berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::destroyMember($id);

        return redirect()->route('admin.member.index')->with('success', 'Member berhasil dihapus');
    }

    public function statusCode($status)
    {
        return $statusCode = Member::generateMemberCode($status);
    }
}
