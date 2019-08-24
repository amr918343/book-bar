<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\book\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(),
        'photo_id' => $faker->numberBetween(1, 60),
        'category_id' => $faker->numberBetween(1, 10),
        'pdf_id' => 1,
        'author_id' => $faker->numberBetween(1, 20),
    ];
});
