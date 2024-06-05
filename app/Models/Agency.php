<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Agency extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'link'];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }
}
