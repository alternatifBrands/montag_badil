<?php

namespace App\Http\Requests\API\Product;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'notes' => ['required', 'string'],
            'is_alternative' => ['required', 'boolean'],
            'barcode' => ['required', 'string'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:90000'],
            'user_id' => ['required', Rule::exists('users', 'id')],
            'brand_id' => ['required', Rule::exists('brands', 'id')],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth('api')->user()->id,
        ]);
    }
}
