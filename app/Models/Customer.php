<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;

   protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'state',
        'points',
    ];
    protected $hidden = [
        'birth_date',
        'phone',
    ];

    public function goldMember()
    {
        return $this->points > 2000;
    }

    public function orders(): HasMany 
    {
<<<<<<< HEAD
        return $this->HasMany(Order::class, 'customer_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
=======
        return $this->HasMany(Order::class, 'customer_id', 'customer_id');
>>>>>>> 846a458058e1841dd59c3f6f2e5179991bc1fe69
    }

} 
