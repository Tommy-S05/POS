<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            "code" => $this->faker->unique()->numberBetween(0001,9999),
            "name" => $this->faker->unique()->sentence(1),
            "image" => $this->faker->imageUrl(200,200),
            "sell_price" => $this->faker->numberBetween(20000, 200000),
            "category_id" => Category::inRandomOrder()->value('id') ?: factory(Category::class),
            "provider_id" => Provider::inRandomOrder()->value('id') ?: factory(Provider::class)
        ];
    }
}
