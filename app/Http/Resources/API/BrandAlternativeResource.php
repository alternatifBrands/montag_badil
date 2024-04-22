<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandAlternativeResource extends JsonResource
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
            'barcode'=>$this->barcode,
            'status'=>$this->status,
            'image' => $this->getFirstMediaUrl('brand_alternative'),
            'user'=>UserResource::make($this->whenLoaded('user')),
            'country'=>CountryResource::make($this->whenLoaded('country')),
            'city'=>CityResource::make($this->whenLoaded('city')),
            'category'=>CategoryResource::make($this->whenLoaded('category')),
        ];
    }
    protected function formatBirthDate($birth)
    {
        if ($birth instanceof Carbon) {
            return $birth->format('d-m-Y');
        }
        return Carbon::createFromFormat('Y-m-d', $birth)->format('d-m-Y');
    }
}
