<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BaseCourse;
use App\Models\Course;
use App\Models\File;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'path' => $faker->word,
        'course_id' => function () {
            return Course::all()->random();
        },
        'base_course_id' => function () {
            return BaseCourse::all()->random();
        }
    ];
});
