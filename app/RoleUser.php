<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RoleUser extends Model
{
    protected $table = 'role_user';

    protected $fillable = ['role_id', 'user_id'];

    static function destroyRoleUser($id)
    {
        RoleUser::where('user_id', $id)->destroy();
    }

    static function firstRole($userId)
    {
        $data = RoleUser::select('roles.name as name', 'roles.description as description')
                    ->join('roles', 'role_user.role_id', 'roles.id')
                    ->firstWhere('role_user.user_id', $userId);
                            
        return $data;
    }

    static function updateRoleUser($request, $roleId)
    {
        RoleUser::where('user_id', $request->id)->update(['role_id' => $roleId]);
    }
}
