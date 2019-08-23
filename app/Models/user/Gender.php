<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    //
    protected $fillable = ['gender'];

    public function user() {
        return $this->hasOne('App\Models\user\User', 'gender_id');
    }
}
