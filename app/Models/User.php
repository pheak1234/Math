<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

#[Fillable(['name', 'email', 'phone', 'password', 'provider', 'provider_id', 'profile_photo_path', 'is_admin'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Get the URL to the user's profile photo.
     */
    protected function profilePhotoUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (! $this->profile_photo_path) {
                    return null;
                }

                if (str_starts_with($this->profile_photo_path, 'http://') || str_starts_with($this->profile_photo_path, 'https://')) {
                    return $this->profile_photo_path;
                }

                return Storage::disk('public')->url($this->profile_photo_path);
            }
        );
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'user_books')
            ->withPivot('status', 'progress', 'last_read_at')
            ->withTimestamps();
    }

    /**
     * @return HasMany<Review, User>
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @return HasMany<Order, User>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function hasOrderedBook(Book $book): bool
    {
        return Order::where('user_id', $this->id)
            ->where('book_id', $book->id)
            ->exists();
    }

    public function hasReadBook(Book $book): bool
    {
        return $this->books()->where('book_id', $book->id)->exists();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_admin || $this->email === 'admin@anontak.com'; // Fallback
    }
}
