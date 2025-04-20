<?php

namespace Database\Seeders;

use App\Models\ProductReview;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductReview::factory()->count(2000)->create();
    }
}
