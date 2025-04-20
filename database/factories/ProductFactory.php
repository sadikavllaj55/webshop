<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,  // Random word for product name
            'description' => $this->faker->paragraph,  // Random paragraph for description
            'price' => $this->faker->randomFloat(2, 0.99, 6500),  // Random price between 1 and 100
            'category_id' => $this->faker->randomElement(Category::query()->pluck('id')->toArray()),
        ];
    }
}
