<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['role_id', 'user_id'];
    public $timestamps = false;

    static function destroyRoleUser($id)
    {
        RoleUser::where('user_id', $id)->delete();
    }

    static function firstRole($userId)
    {
        $data = RoleUser::select('roles.name as name', 'roles.description as description')
                    ->join('roles', 'role_user.role_id', 'roles.id')
                    ->firstWhere('role_user.user_id', $userId);
                            
        return $data;
    }

    static function updateRoleUser($userId, $roleId)
    {
        return RoleUser::where('user_id', $userId)->update(['role_id' => $roleId]);
    }
}
