<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        for($i = 1; $i <= 171; $i++) {
            ProductImage::factory()->create([
                'product_id' => $i,
                'original_name' => "images-product-$i.jpg",
                'path' => "/images/products/product-$i.jpg",
                'thumbnail_path' => "/images/thumbs/products/product-$i.jpg",
                'is_main' => 1,
            ]);
        }
    }
}

