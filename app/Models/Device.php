<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name',
        'location',
        'ip_address',
        'api_key',
        'status',
        'last_seen'
    ];
}
