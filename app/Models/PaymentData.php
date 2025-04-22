<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentData extends Model
{
    protected $table = 'payments';

    protected $fillable = ['payment_method', 'data'];

    protected $casts = [
        'data' => 'array',
    ];
}
