<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Set custom primary key
    protected $primaryKey = 'booking_id';

    // Disable auto-increment if not required (optional)
    public $incrementing = true;

    // Set the key type to 'int' for auto-increment
    protected $keyType = 'int';

    // Define fillable attributes
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'start_date',
        'end_date',
        'pickup_location',
        'dropoff_location',
        'total_cost',
        'payment_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id'); // Adjust the foreign and local keys
    }

 
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }
}
