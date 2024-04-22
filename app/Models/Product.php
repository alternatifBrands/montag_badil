<?php

namespace App\Models;

use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Spatie\MediaLibrary\HasMedia;
use App\Models\ProductAlternative;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'notes',
        'barcode',
        'image',
        'status',
        'is_alternative',
        'user_id',
        'brand_id',
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product');
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function productAlternatives(): BelongsToMany
    {
        return $this->belongsToMany(ProductAlternative::class,'products_alternatives', 'product_id', 'alternative_id');
    }
}
