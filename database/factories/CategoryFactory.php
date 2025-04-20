<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->unique()->word()), // Random category name
            'description' => $this->faker->sentence(), // Random description
            'parent_id' => $this->faker->randomElement(Category::pluck('id')->toArray()) // Random parent category
        ];
    }

    /**
     * Create a parent category (without a parent).
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function parentCategory()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => null, // No parent category
            ];
        });
    }
}
