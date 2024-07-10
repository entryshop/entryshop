<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'       => $this->faker->name,
            'code'       => $this->faker->unique()->randomNumber(8),
            'is_default' => false,
        ];
    }
}
