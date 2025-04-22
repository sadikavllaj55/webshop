<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'total', 'product_name'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getPrice(): string
    {
        return number_format($this->price ?? 0, 2);
    }

    public function getTotalPrice(): string
    {
        return number_format(($this->price ?? 0) * $this->quantity, 2);
    }
}
