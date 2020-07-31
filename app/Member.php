<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['code', 'name', 'address', 'bank', 'status'];

    static function destroyMember($id)
    {
        Member::findOrFail($id)->delete();
    }

    static function getMember()
    {
        return Member::orderBy('name')->get();
    }

    static function showMember($id)
    {
        return json_encode(Member::whereId($id)->first());
    }

    static function storeMember($request)
    {
        if ($request->status == 'Reseller') {
            $code = Member::generateMemberCode('RS');
        } else if ($request->status == 'Mitra Usaha') {
            $code = Member::generateMemberCode('MT');
        } else if ($request->status == 'Dropship') {
            $code = Member::generateMemberCode('DR');
        }

        Member::create([
            'code' => $code,
            'name' => $request->name,
            'address' => $request->address,
            'bank' => $request->bank,
            'status' => $request->status
        ]);
    }

    static function updateMember($request)
    {
        Member::findOrFail($request->id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'address' => $request->address,
            'bank' => $request->bank,
            'status' => $request->status
        ]);
    }

    static function latestCode($code)
    {
        $data = Member::selectRaw('RIGHT(`code`, 4) as code')
                        ->where('code', 'like', $code.'%')
                        ->latest()
                        ->first();

        if ($data) {
            $memberCode = intval($data->code);
            return ++$memberCode;
        } else {
            return 1;
        }
    }

    static function generateMemberCode($status)
    {
        $code = Member::latestCode($status);

        if ($code['code'] < 10) {
            $data = $status.'000'.$code;
        } else if ($code['code'] < 100) {
            $data = $status.'00'.$code;
        } else if ($code['code'] < 1000) {
            $data = $status.'0'.$code;
        } else if ($code['code'] < 10000) {
            $data = $status.$code;
        }

        return $data;
    }
}
