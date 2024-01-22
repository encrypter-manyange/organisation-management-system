<?php

namespace App;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    public function hasPermission($permission_name)
    {
        if (empty($this->status)) return 0;
        $count = 0;
        foreach ($this->role->role_permissions as $role_permission) {
            if ($role_permission->permission->name == $permission_name) {
                $count++;
            } else {

            }
        }
        return $count > 0;

    }
//
//    public function createToken($name = ‘api-token’){
//        return $this->createApiAccessToken($name);
//    }
//    protected function createApiAccessToken($name){
//        return $this->setApiToken($name, Hash::make(str_random(40)));
//
//    }
}
