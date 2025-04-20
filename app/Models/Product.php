<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category_id'];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function shopItems(): Builder
    {
        return Product::query()
            ->join('reviews', 'products.id', '=', 'reviews.product_id', 'left')
            ->join(
                'product_images',
                function (JoinClause $join) {
                    $join->on('products.id', '=', 'product_images.product_id')
                        ->where('product_images.is_main', '=', 1);
                }
            )->join(
                'categories',
                'products.category_id',
                '=',
                'categories.id',
                'left'
            )->select([
                'products.*',
                'products.name as product_name',
                'categories.name as category',
                'product_images.path as image_path',
                DB::raw('AVG(reviews.rating) as rating'),
                DB::raw('COUNT(reviews.id) as total_reviews'),
            ]);
    }
}
