<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CoursesTableSeeder::class,
            LessonsTableSeeder::class,
            TagsTableSeeder::class,
            ReviewsTableSeeder::class,
            DocumentsTableSeeder::class,
            CourseTagTableSeeder::class,
            LessonUserTableSeeder::class,
            CourseUserTableSeeder::class,
            RepliesTableSeeder::class,
        ]);
    }
}
