<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Exam;

class QuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'exam_id' => Exam::factory(),
            'question_text' => $this->faker->sentence(12) . '?',
            'type' => 'mcq', // أو true_false
        ];
    }
}
