<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    /**
     * @param int $num
     * @return Collection<int, Product>
     */
    public function relatedProducts(int $num = 5): Collection
    {
        return Product::with(['image', 'category'])
            ->join('reviews', 'products.id', '=', 'reviews.product_id', 'left')
            ->whereNot('products.id', '=', $this->id)
            ->where('products.category_id', '=', $this->category_id)
            ->select([
                'products.*',
                DB::raw('AVG(reviews.rating) as rating'),
                DB::raw('COUNT(reviews.id) as total_reviews'),
            ])
            ->groupBy('products.id')
            ->take($num)
            ->get();
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
                'categories.name as category',
                'product_images.path as image_path',
                DB::raw('AVG(reviews.rating) as rating'),
                DB::raw('COUNT(reviews.id) as total_reviews'),
            ]);
    }
}
