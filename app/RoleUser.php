<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RoleUser extends Model
{
    protected $table = 'role_user';

    protected $fillable = ['role_id', 'user_id'];

    static function getRole()
    {
        $data = RoleUser::select('roles.name as name', 'roles.description as description')
                    ->join('roles', 'role_user.role_id', 'roles.id')
                    ->firstWhere('role_user.user_id', Auth::user()->id);
                            
        return $data;
    }
}
