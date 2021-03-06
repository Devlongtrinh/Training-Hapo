<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;
use App\Models\User;

class LessonUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_id' => $this->faker->randomElement(Lesson::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}
