<?php

namespace App\Http\Requests\API\BrandMapBrandAlt;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'brand_id' => ['required',Rule::exists('brands','id')],
            'alternative_id' => ['required', 'array'],
            'alternative_id.*' => ['required', Rule::exists('brand_alternatives', 'id')],
        ];
    }
}
