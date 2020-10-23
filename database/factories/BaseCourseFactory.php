<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BaseCourse;
use Faker\Generator as Faker;

$factory->define(BaseCourse::class, function (Faker $faker) {
    return [
        'version' => $faker->numberBetween($min = 1, $max = 12),
    ];
});
