<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'thumbnail' => $this->faker->imageUrl(640, 360, 'education', true),
            'teacher_id' => User::factory(), // هنعدّلها في seeder لو عايزين
            'price' => $this->faker->randomFloat(2, 100, 1500),
            'is_active' => true,
        ];
    }
}
