<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Cette fonction permet de lier un utilisateur à un ou plusieurs posts
    public function posts()
    {
        return $this->hasMany('App\posts');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }



    // Cette fonction permet de lier un utilisateur à un ou plusieurs rôle(s)
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    // Cette fonction permet de récuperer un utilisateur qui a le rôle admin
    public function isAdmin(){
        return $this->roles()->where('name','admin')->first();
    }

    // Cette fonction
    public function hasAnyRole(array $roles){
        return $this->roles()->whereIn('name',$roles)->first();
    }

}
