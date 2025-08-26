<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\ProductImage;
use App\Models\AttributeValue;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'gender',
        'description',
        'price_cents',
        'stock',
        'is_published',
        'published_at',
    ];

    public function price(): string
    {
        return number_format($this->price_cents / 100, 2);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class);
    }
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('is_primary', 'desc')->orderBy('sort_order');
    }
    public function scopeRecent($q)
    {
        return $q->orderByDesc('created_at');
    }
    public function scopeInStock($q)
    {
        return $q->where('stock', '>', 0);
    }
    public function scopeOutOfStock($q)
    {
        return $q->where('stock', 0);
    }

    public function soldOut(): bool
    {
        return $this->stock <= 0;
    }
    public function inStockBool(): bool
    {
        return $this->stock > 0;
    }
    public function priceDecimal(): float
    {
        return $this->price_cents / 100;
    }
    public function isPublishedNow(): bool
    {
        return $this->is_published && (is_null($this->published_at) || $this->published_at->lte(now()));
    }
    public function primaryImageUrl(): string
    {
        return optional($this->images->first())->url ?? 'https://placehold.co/600x600?text=No+Image';
    }
    public function getPriceAttribute(): float
    {
        return $this->price_cents / 100;
    }
    public function getSoldOutAttribute(): bool
    {
        return $this->stock <= 0;
    }
    public function getPrimaryImageUrlAttribute(): string
    {
        return $this->primaryImageUrl();
    }

    public function scopePublished($q)
    {
        return $q->where('is_published', true)
            ->where(fn($q) => $q->whereNull('published_at')->orWhere('published_at', '<=', now()));
    }

    // Gender filter; by default includes unisex in each section
    public function scopeGender($q, ?string $gender, bool $includeUnisex = true)
    {
        $g = $gender ? strtolower($gender) : null;

        return match ($g) {
            'men' => $q->whereIn('gender', $includeUnisex ? ['men', 'unisex'] : ['men']),
            'women' => $q->whereIn('gender', $includeUnisex ? ['women', 'unisex'] : ['women']),
            default => $q, // null or anything else = all
        };
    }

    public static function byGender(?string $gender = null, int $perPage = 24, bool $includeUnisex = true)
    {
        return static::query()
            ->published()
            ->gender($gender, $includeUnisex)
            ->latest('created_at')
            ->paginate($perPage);
    }
}
