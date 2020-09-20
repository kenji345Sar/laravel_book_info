<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use App\Models\User;

use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->text(50),
        'body' => $faker->text(500),
        'user_id' => function() {
            return factory(User::class);
        }
    ];
});
