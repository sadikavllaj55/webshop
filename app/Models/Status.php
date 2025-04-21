<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
