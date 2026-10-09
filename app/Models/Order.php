<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
