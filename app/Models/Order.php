<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customer(): BelongsTo 
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
