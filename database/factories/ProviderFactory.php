<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->email(),
            'ruc_number' => $this->faker->unique()->numberBetween(10000000000, 99999999999),
            'address' => $this->faker->optional()->address(),
            'phone' => $this->faker->unique()->phoneNumber()
        ];
    }
}
