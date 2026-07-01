<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Device extends Model
{
    protected $fillable = [
        'uuid',
        'device_name',
        'location',
        'ip_address',
        'wifi_rssi',
        'heap',
        'uptime',
        'mac_address',
        'api_key',
        'firmware',
        'relay_time',
        'status',
        'last_seen',
        'description',

    ];

    protected $casts = [
        'status' => 'boolean',
        'last_seen' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Device $device) {

            if (empty($device->uuid)) {
                $device->uuid = (string) Str::uuid();
            }

            if (empty($device->api_key)) {
                $device->api_key = bin2hex(random_bytes(32));
            }

            if (empty($device->firmware)) {
                $device->firmware = '1.0.0';
            }

            if (empty($device->relay_time)) {
                $device->relay_time = 3;
            }

        });
    }

public function isOnline(): bool
{
    if (!$this->last_seen) {

        return false;

    }

    return now()
        ->diffInSeconds($this->last_seen)
        < 30;
}
}
