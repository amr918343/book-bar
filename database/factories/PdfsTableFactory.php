<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\book\Pdf::class, function (Faker $faker) {
    return [
        //
        'file' => $faker->file(public_path(''), '', false),
    ];
});
