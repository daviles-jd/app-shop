<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => substr($this->faker->sentence(3), 0, -1),
            'description' => $this->faker->sentence(10),
            'long_description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 5, 150),

            'category_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
