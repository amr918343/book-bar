<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//Image categories
//abstract animals business cats city food night lifefashion people nature sports technics transport
use Faker\Generator as Faker;

$factory->define(\App\Models\user\UserPhoto::class, function (Faker $faker) {

    return [
        //
        'file' => $faker->image(public_path('images/users'),400,300,'people',false),

    ];

});
