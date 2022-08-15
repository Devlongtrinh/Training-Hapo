<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;
use App\Models\Course;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'tag' => $this->faker->word(),
            'time' => $this->faker->dateTime()->format('H:i:s'),
            'document' => $this->faker->text(50),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];
    }
}
