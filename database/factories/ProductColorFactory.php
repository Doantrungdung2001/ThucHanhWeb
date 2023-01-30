<?php

namespace Database\Factories;

use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductColorFactory extends Factory
{
    protected $model = ProductColor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 20),
            'color_id' => $this->faker->numberBetween(1, 7)
        ];
    }
}
