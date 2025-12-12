<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'price' => $this->faker->randomFloat(2, 100, 1000),
           'niveau' => $this->faker->randomElement(['A0', 'A1', 'A2', 'B1', 'B2']),

            'type' => $this->faker->word,
            'description' => $this->faker->optional()->paragraph,
            'nb_lessons' => $this->faker->numberBetween(4, 12),

        ];
    }
}
