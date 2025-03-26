<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_name',
        'price',
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_name',
        'street_address',
        'street_address2',
        'city',
        'state',
        'postcode',
        'country',
        'password',
        'payment_method',
    ];
}
