<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = ['name'];

    public function books() {
        return $this->hasMany('App\Models\book\Book', 'author_id');
    }
}
