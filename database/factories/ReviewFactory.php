<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductReview>
 */
class ReviewFactory extends Factory
{
    protected $model = ProductReview::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => $this->faker->randomElement(Product::query()->pluck('id')),
            'user_id' => $this->faker->randomElement(User::query()->pluck('id')),
            'rating' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) / 2,
            'comment' => $this->faker->text(),
        ];
    }
}
