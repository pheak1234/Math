<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class TeachingMaterial extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'category',
        'grade_level',
        'description',
        'price',
        'specifications',
        'image',
        'gallery',
        'guide_url',
        'is_featured',
    ];

    /**
     * @var list<string>
     */
    protected $appends = [
        'image_url',
        'gallery_urls',
        'all_images',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'price' => 'decimal:2',
            'gallery' => 'array',
        ];
    }

    public function getImageUrlAttribute(): string
    {
        if (! $this->image) {
            return asset('images/tool_ruler.svg');
        }

        if (str_starts_with($this->image, '/') || str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return Storage::url($this->image);
    }

    /**
     * @return list<string>
     */
    public function getGalleryUrlsAttribute(): array
    {
        if (empty($this->gallery) || ! is_array($this->gallery)) {
            return [];
        }

        $urls = [];
        foreach ($this->gallery as $img) {
            if (! empty($img)) {
                if (str_starts_with($img, '/') || str_starts_with($img, 'http')) {
                    $urls[] = $img;
                } else {
                    $urls[] = Storage::url($img);
                }
            }
        }

        return $urls;
    }

    /**
     * @return list<string>
     */
    public function getAllImagesAttribute(): array
    {
        $images = [];
        $mainImg = $this->image_url;
        if ($mainImg) {
            $images[] = $mainImg;
        }

        foreach ($this->gallery_urls as $url) {
            if (! in_array($url, $images, true)) {
                $images[] = $url;
            }
        }

        return ! empty($images) ? $images : [asset('images/tool_ruler.svg')];
    }

    /**
     * @return HasMany<Order, $this>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
