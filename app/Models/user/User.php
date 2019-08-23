<?php

namespace App\Models\user;

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
        'name', 'email', 'password', 'role_id', 'photo_id', 'gender_id',
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

    public function role() {
        return $this->belongsTo('App\Models\user\Role', 'role_id');
    }

    public function photo() {
        return $this->belongsTo('App\Models\user\UserPhoto', 'photo_id');
    }

    public function gender() {
        return $this->belongsTo('App\Models\user\Gender', 'gender_id');
    }

    public function isAdmin() {
        return $this->role->name == 'admin' ? true : false;
    }
}
