<?php

namespace App\Http\Requests\API\ProductAlternative;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            'notes' => ['sometimes', 'string'],
            'barcode' => ['sometimes', 'string'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:90000'],
            'user_id' => ['required', Rule::exists('users', 'id')],
            'brand_id' => ['sometimes', Rule::exists('brands', 'id')],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth('api')->user()->id,
        ]);
    }
}
