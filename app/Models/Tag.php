<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    protected $fillable = ['name', 'value'];

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
}
