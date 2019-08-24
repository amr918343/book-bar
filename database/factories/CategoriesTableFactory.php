<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->randomElement([
            'Fantasy',
            'Science fiction',
            'Western',
            'Romance',
            'Thriller',
            'Mystery',
            'Detective story',
            'Dystopia',
            'Memoir',
            'Biography',
        ]),
        'description' => $faker->realText(),
    ];
});
