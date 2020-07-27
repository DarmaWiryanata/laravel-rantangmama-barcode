<?php

namespace App;

use DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || 
                    abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || 
                abort(401, 'This action is unauthorized.');
    }
    
    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    
    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    static function destroyUser($id)
    {
        User::findOrFail($id)->delete();
    }

    public static function getActiveRole($id){
        $role_id = DB::table('role_user')->select('role_id')->where('user_id',$id)->first();
        $role = Role::find($role_id->role_id);
        return $role->name;
    }

    static function getUser()
    {
        return User::select('users.id as id', 'users.username as username', 'role_user.id as role_id', 'roles.description as role_name')
                    ->join('role_user', 'users.id', 'role_user.user_id')
                    ->join('roles', 'role_user.role_id', 'roles.id')
                    ->get();
    }

    static function firstUser($id)
    {
        return User::select('users.id as id', 'users.username as name', 'role_user.id as role_id', 'roles.description as role_name')
                    ->join('role_user', 'users.id', 'role_user.user_id')
                    ->join('roles', 'role_user.role_id', 'roles.id')
                    ->where('users.id', $id)
                    ->first();
    }

    static function resetPassword($id)
    {
        User::whereId($id)->update(['password' => Hash::make('12345678')]);
    }

    static function storeUser($request)
    {
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ])->roles()->attach(Role::where('name', $request->role)->first());
    }

    static function updatePassword($id, $password)
    {
        User::whereId($id)->update(['password' => Hash::make($password)]);
    }

    static function updateUser($request)
    {
        User::findOrFail($request->id)->update(['username' => $request->username]);
    }
}
