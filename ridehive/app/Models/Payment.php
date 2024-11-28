<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Set custom primary key
    protected $primaryKey = 'payment_id';

    // Disable auto-increment if not required (optional)
    public $incrementing = true;

    // Set the key type to 'int' for auto-increment
    protected $keyType = 'int';

    // Define fillable attributes
    protected $fillable = [
        'booking_id',
        'amount',
        'payment_date',
        'payment_method',
        'status'
    ];
}
