<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserRegistered extends Authenticatable
{
    protected $table = 'userregistered'; // Specify the table name

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
