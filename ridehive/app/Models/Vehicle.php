<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // Specify the primary key
    protected $primaryKey = 'vehicle_id';

    // Disable auto-incrementing if necessary
    public $incrementing = true;

    // Specify the primary key type
    protected $keyType = 'int';


    protected $fillable = [
        'vendor_id',
        'type',
        'model',
        'price_per_day',
        'status',
        'image',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'vehicle_id', 'id');
    }
}
