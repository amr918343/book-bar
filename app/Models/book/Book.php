<?php

namespace App\Models\book;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    protected $fillable = ['name', 'category_id', 'photo_id', 'pdf_id', 'description', 'author_id'];

    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function photo() {
        return $this->belongsTo('App\Models\book\BookPhoto', 'photo_id');
    }

    public function pdf() {
        return $this->belongsTo('App\Models\book\Pdf', 'pdf_id');
    }

    public function author() {
        return $this->belongsTo('App\Models\user\Author', 'author_id');
    }

}