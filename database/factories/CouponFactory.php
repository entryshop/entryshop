<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    public function definition(): array
    {
        return [
            'stock'     => rand(1, 100),
            'total'     => rand(100, 200),
            'active'    => true,
            'can_issue' => true,
            'can_use'   => true,
            'start_at'  => now(),
            'end_at'    => now()->addDays(30),
        ];
    }

    public function outstock(): static
    {
        return $this->state(fn(array $attributes) => [
            'stock' => 0,
        ]);
    }
}
