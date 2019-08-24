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
        return '/images/users/' . $val;
    }

//    public function setFileAttribute($val) {
//        if (strpos($val, 'C:') !== false) {
//            $this->attributes['file'] = str_replace('C:\xampp\htdocs\I Love Reading\public\images/users/', '', $val);
//        }
//        $this->attributes['file'] =  $val;
//    }


}