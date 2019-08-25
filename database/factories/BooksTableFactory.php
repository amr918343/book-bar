<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\book\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(),
        'photo_id' => $faker->numberBetween(1, 25),
        'category_id' => $faker->numberBetween(1, 10),
        'pdf_id' => $faker->numberBetween(1, 25),
        'author_id' => $faker->numberBetween(1, 20),
    ];
});
