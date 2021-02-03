<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getPriceFormatedAttribute()
    {
        return 'R$ ' . number_format($this->attributes['price'], 2, ',', '.');
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
        'expiration_date' => 'datetime',
        'manufacturing_date' => 'datetime'
    ];
}
