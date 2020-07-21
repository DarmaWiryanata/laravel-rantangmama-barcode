<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['code', 'name', 'address', 'bank', 'status'];

    static function destroyMember($id)
    {
        Member::findOrFail($id)->destroy();
    }

    static function storeMember($request)
    {
        Member::create([
            'code' => 'RMF01-'.rand(100000,999999).'-'.rand(1000,9999),
            'name' => $request->name,
            'address' => $request->address,
            'bank' => $request->bank,
            'status' => $request->status
        ]);
    }

    static function updateMember($request, $id)
    {
        Member::findOrFail($id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'address' => $request->address,
            'bank' => $request->bank,
            'status' => $request->status
        ]);
    }
}
