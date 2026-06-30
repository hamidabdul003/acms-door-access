<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $fillable = [
        'card_id',
        'uid',
        'device',
        'ip_address'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
