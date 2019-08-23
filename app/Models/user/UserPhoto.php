<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    //
    protected $fillable = [
        'file'
    ];


    public function user() {
        $this->hasOne('App\Models\user\User', 'photo_id');
    }

    public function getFileAttribute($val) {
        return 'images/users/' . $val;
    }


}
