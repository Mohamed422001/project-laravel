<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

class ExamFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'title' => 'Quiz - ' . $this->faker->word(),
            'duration' => $this->faker->randomElement([15, 20, 30, 45, 60]),
        ];
    }
}
