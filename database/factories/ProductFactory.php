<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(10000, 99999),
            'title' => $this->faker->name,
            'image' => 'https://img.gigatron.rs/img/products/medium/image5fabfad07a1b8.png',
            'price' => $this->faker->numberBetween(80000, 95000),
            'price_retail' => $this->faker->numberBetween(95000, 100000),
            'price_history' => $this->faker->numberBetween(70000, 80000),
            'category' => $this->faker->name,
            'subcategory' => $this->faker->name,
        ];
    }
}
