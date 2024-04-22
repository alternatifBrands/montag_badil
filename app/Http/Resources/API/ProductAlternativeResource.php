<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAlternativeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'notes'=>$this->notes,
            'barcode'=>$this->barcode,
            'status'=>$this->status,
            'image' => $this->getFirstMediaUrl('product_alternative'),
            'user'=>UserResource::make($this->whenLoaded('user')),
            'brand'=>CategoryResource::make($this->whenLoaded('brand')),
        ];
    }
}
