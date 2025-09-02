<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Enrollment;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'enrollment_id' => Enrollment::factory(),
            'amount' => $this->faker->randomFloat(2, 100, 1500),
            'status' => $this->faker->randomElement(['pending','paid','failed']),
            'payment_method' => $this->faker->randomElement(['visa','vodafone_cash','fawry']),
        ];
    }
}
