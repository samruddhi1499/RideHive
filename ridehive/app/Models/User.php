<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;


    protected $primaryKey = 'user_id'; // Set custom primary key

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'contact', 
    ];   
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
