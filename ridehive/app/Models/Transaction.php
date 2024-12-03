<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method',
        'status',
        'created_at',
        'updated_at',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
