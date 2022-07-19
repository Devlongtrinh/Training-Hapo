<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;

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
            'course_id' => $this->faker->numberBetween(0, 100),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'tag' => $this->faker->word(),
            'time' => $this->faker->dateTime()->format('H:i:s'),
            'cost' => $this->faker->numberBetween(1000, 9000),
            'document' => $this->faker->text(50),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];
    }
}
