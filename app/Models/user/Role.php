<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function users() {
        $this->hasMany('App\Models\user\User', 'role_id');
    }

}
