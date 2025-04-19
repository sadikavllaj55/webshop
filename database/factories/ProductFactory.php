<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,  // Random word for product name
            'description' => $this->faker->paragraph,  // Random paragraph for description
            'price' => $this->faker->randomFloat(2, 1, 100),  // Random price between 1 and 100
            'image' => $this->faker->imageUrl(),  // Random image URL
        ];
    }
}
