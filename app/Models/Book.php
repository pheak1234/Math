<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['title', 'author', 'cover_image', 'price', 'description', 'priority'])]
class Book extends Model
{
    /**
     * @return BelongsToMany<User, Book>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_books')
            ->withPivot('status', 'progress', 'last_read_at')
            ->withTimestamps();
    }

    /**
     * @return HasMany<Review, Book>
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function averageRating(): float
    {
        return round((float) ($this->reviews()->avg('rating') ?? 0), 1);
    }
}
