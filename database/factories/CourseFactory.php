<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->word,
        'version' => $faker->numberBetween($min = 1, $max = 12),
        'iap_id_apple' => $faker->word,
        'iap_id_google' => $faker->word,
        'test' => $faker->boolean,
        'live' => $faker->boolean,
        'title' => $faker->sentence(),
        'description' => $faker->text
    ];
});
