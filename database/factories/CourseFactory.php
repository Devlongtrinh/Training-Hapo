<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;
use App\Models\Course;

class CourseFactory extends Factory
{
    protected $model = Course::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(100),
            'cost' => $this->faker->numberBetween(1000, 9000),
            'status' => $this->faker->numberBetween(0, 2),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];
    }
}
