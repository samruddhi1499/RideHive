<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Availability extends Model
{
    use HasFactory;

    // Set custom primary key
    protected $primaryKey = 'availability_id';

    // Disable auto-increment if not required (optional)
    public $incrementing = true;

    // Set the key type to 'int' for auto-increment
    protected $keyType = 'int';

    // Define fillable attributes
    protected $fillable = [
        'vehicle_id',
        'start_date',
        'end_date',
        'booking_id',
        'status'
    ];
}
