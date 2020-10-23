<?php

use App\Models\BaseCourse;
use App\Models\Course;
use App\Models\File;
use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(BaseCourse::class, 5)->create();
        factory(Course::class, 10)->create();
    }
}
