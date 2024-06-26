<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ad extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'type',
        'category_id',
        'location_id',
        'price',
        'likes',
        'is_premium',
        'is_published',
        'published_at',
        'link_3d',
        'phone',
        'email',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    protected $with = ['agency'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withPivot('value');
    }

    public function scopePremium()
    {
        return $this->where('is_premium', true);
    }

    public function scopeSale()
    {
        return $this->where('type', 1);
    }

    public function scopeRenting()
    {
        return $this->where('type', 0);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
