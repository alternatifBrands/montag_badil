<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductAlternative extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'notes',
        'barcode',
        'image',
        'status',
        'user_id',
        'brand_id',
    ];
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_alternative');
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'products_alternatives', 'alternative_id','product_id');
    }
}
