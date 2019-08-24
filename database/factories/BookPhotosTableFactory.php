<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\book\BookPhoto::class, function (Faker $faker) {
    return [
        'file' => $faker->image(public_path('images/books'),400,300,null,false),
    ];
});
