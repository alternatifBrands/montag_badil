<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state_id',
        'country_id'
    ];
    public $timestamps = false;
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
}
