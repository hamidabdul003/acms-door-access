<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardPermission extends Model
{
    protected $fillable = [

        'card_id',

        'device_id',

    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
