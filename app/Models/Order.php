<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'reference_id',
        'payment_id',
        'address_id',
        'customer_email',
        'customer_phone',
        'status',
        'total_price'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(PaymentData::class);
    }

    public function getTotalPrice(): string
    {
        return number_format($this->total_price ?? '', 2);
    }

    public function getStatusHtml(): string
    {
        switch ($this->status) {
            case 'pending':
            case 'processing':
                $class = 'warning';
                break;
            case 'rejected':
                $class = 'danger';
                break;
            case 'success':
                $class = 'success';
                break;
            default:
                $class = 'info';
        }

        return "<span class=\"badge bg-light-$class text-dark-$class ms-2\">" . ucfirst($this->status) . "</span>";
    }
}
