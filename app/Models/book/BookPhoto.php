<?php

namespace App\Models\book;

use Illuminate\Database\Eloquent\Model;

class BookPhoto extends Model
{
    //
    protected $fillable = [
        'file'
    ];

    public function book() {
        return $this->hasOne('App\Models\book\Book', 'photo_id');
    }

    public function getFileAttribute($val) {
        return '/images/books/' . $val;
    }
}
