<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'uid',
        'name',
        'position',
        'status'
    ];

    public function logs()
    {
        return $this->hasMany(AccessLog::class);
    }
}
