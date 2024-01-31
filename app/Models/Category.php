<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillabel = ['name'];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }
}