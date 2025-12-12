<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Group;
use App\Models\Course;

class GroupFactory extends Factory
{
    protected $model = Group::class;

    public function definition(): array
    {
        return [
            'group_name' => $this->faker->words(2, true),
            'course_id' => Course::factory(), // связь с курсом
            
            'capacity' => $this->faker->numberBetween(5, 20),
'start_date' => $this->faker->date(),
'end_date' => $this->faker->optional()->date(),

        ];
    }
}
