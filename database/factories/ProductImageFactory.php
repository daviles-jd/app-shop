<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\ProductImage;

class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return arrayS
     */
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(250, 250),
            'product_id' => $this->faker->numberBetween(1, 100)
        ];
    }
}
