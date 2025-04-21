<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'order_id',
        'type',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
