<?php

namespace App\Models;

use App\Notifications\OrderStatusNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'teaching_material_id',
        'book_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'quantity',
        'total_price',
        'payment_method',
        'payment_receipt',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'total_price' => 'decimal:2',
            'quantity' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teachingMaterial(): BelongsTo
    {
        return $this->belongsTo(TeachingMaterial::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function getItemNameAttribute(): string
    {
        if ($this->book) {
            return $this->book->title;
        }

        if ($this->teachingMaterial) {
            return $this->teachingMaterial->name;
        }

        if ($this->notes && str_contains($this->notes, 'Group Order')) {
            return 'កញ្ចប់សម្ភារៈបង្រៀន (Group Order)';
        }

        return 'ផលិតផលគណិតវិទ្យា';
    }

    public function getItemImageAttribute(): string
    {
        if ($this->book) {
            if ($this->book->cover_image) {
                return str_starts_with($this->book->cover_image, '/') || str_starts_with($this->book->cover_image, 'http')
                    ? $this->book->cover_image
                    : Storage::url($this->book->cover_image);
            }

            return asset('images/book_math_blue.svg');
        }

        if ($this->teachingMaterial) {
            return $this->teachingMaterial->image_url;
        }

        return asset('images/tool_ruler.svg');
    }

    public function getReceiptUrlAttribute(): ?string
    {
        if (! $this->payment_receipt) {
            return null;
        }

        if (str_starts_with($this->payment_receipt, '/') || str_starts_with($this->payment_receipt, 'http')) {
            return $this->payment_receipt;
        }

        return Storage::url($this->payment_receipt);
    }

    public function isSuccessful(): bool
    {
        return in_array($this->status, ['approved', 'completed'], true);
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isCancelled(): bool
    {
        return in_array($this->status, ['cancelled', 'rejected'], true);
    }

    /**
     * Dispatch notification to the associated user upon status changes.
     */
    public function notifyUser(string $status, ?string $reason = null, ?string $customMessage = null): void
    {
        $user = $this->user;

        if (! $user && $this->customer_phone) {
            $user = User::where('phone', $this->customer_phone)->first();
            if ($user) {
                $this->user_id = $user->id;
                $this->saveQuietly();
            }
        }

        if ($user) {
            $user->notify(new OrderStatusNotification($this, $status, $reason, $customMessage));
        }
    }
}
