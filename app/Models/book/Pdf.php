<?php

namespace App\Models\book;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    //

    protected $fillable = [
        'file'
    ];

    public function book() {
        return $this->hasOne('App\Book', 'pdf_id');
    }


    public function getFileAttribute($val) {
        return 'pdf/' . $val;
    }
}
