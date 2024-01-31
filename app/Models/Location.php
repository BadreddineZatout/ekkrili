<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    protected $fillable = [
        'address',
        'postal_code',
        'city',
        'state',
        'latitude',
        'longitude',
    ];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }
}
