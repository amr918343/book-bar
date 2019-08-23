<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\user\UserPhoto::class, function (Faker $faker) {

    return [
        //
        'file' => $faker->image(public_path('images/users')),

    ];

});
