<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [

        'uid',

        'owner_name',

        'owner_type',

        'status',

        'expired_at',

    ];

    protected $casts = [

        'status'=>'boolean',

        'expired_at'=>'date',

    ];
    public function permissions()
    {
        return $this->hasMany(
            CardPermission::class
        );
    }

    public function isExpired()
    {
        if(!$this->expired_at){

            return false;

        }

        return now()->gt(
            $this->expired_at
        );
    }
}
