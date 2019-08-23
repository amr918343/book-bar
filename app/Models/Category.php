<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    //
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source'    => 'name',
                'onUpdate'  => false,
            ]
        ];
    }

    protected $fillable = ['name', 'description'];

    public function books() {
        return $this->hasMany('App\Models\book\Book', 'category_id');
    }

}
