<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Role;
use App\RoleUser;
use App\User;

use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $role = DB::table('roles')->where('id', 2)->get();
        $user = User::getUser();

        return view('admin.user', compact('user'));
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
            'username'  => ['required', 'string', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'role'      => ['required'],
        ]);
        
        User::storeUser($request);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $data = json_encode(User::firstUser($id));
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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'role' => 'required'
        ]);
        User::updateUser($request);
        $roleId = Role::firstRoleByName($request->role);
        RoleUser::updateRoleUser($request, $roleId->id);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroyUser($id);
        RoleUser::destroyRoleUser($id);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus');
    }

    public function resetPassword($id)
    {
        User::resetPassword($id);
    }
}
