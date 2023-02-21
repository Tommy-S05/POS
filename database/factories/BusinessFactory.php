<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'description' => $this->faker->sentence(10),
            'logo' => $this->faker->imageUrl(200,200),
            'email' => $this->faker->companyEmail(),
            'address' => $this->faker->address(),
            'ruc_number' => $this->faker->unique()->numberBetween(10000000000, 99999999999),
            'phone' => $this->faker->phoneNumber()
        ];
    }
}
