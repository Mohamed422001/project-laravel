<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

class LessonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->paragraphs(2, true),
            'video_url' => $this->faker->url(),
            'order' => $this->faker->numberBetween(1, 20),
        ];
    }
}
