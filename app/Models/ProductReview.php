<?php

namespace App\Models;

use Database\Factories\ReviewFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'product_id', 'user_id', 'rating', 'comment', 'published'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory(): Factory
    {
        return ReviewFactory::new();
    }
}
