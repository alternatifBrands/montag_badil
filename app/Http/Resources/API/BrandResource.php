<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'founder'=>$this->founder,
            'owner'=>$this->owner,
            'year'=>$this->year,
            'url'=>$this->url,
            'description'=>$this->description,
            'parent_company'=>$this->parent_company,
            'industry'=>$this->industry,
            'notes'=>$this->notes,
            'is_alternative'=>$this->is_alternative,
            'barcode'=>$this->barcode,
            'status'=>$this->status,
            'spatie_image' => $this->getFirstMediaUrl('brand'),
            'column_image' => Storage::disk('public')->url($this->image),
            'user'=>UserResource::make($this->whenLoaded('user')),
            'country'=>CountryResource::make($this->whenLoaded('country')),
            'city'=>CityResource::make($this->whenLoaded('city')),
            'category'=>CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
