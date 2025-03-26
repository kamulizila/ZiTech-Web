<?php

// app/Models/GetStartedRequest.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetStartedRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'password', // Add this line
        'company_name',
        'company_location',
        'company_address',
        'service_type',
        'system_proposal',
        'document_path'
    ];
}
