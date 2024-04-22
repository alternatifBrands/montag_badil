<?php

namespace App\Http\Requests\API\Brand;

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
            'founder' => ['required', 'string'],
            'owner' => ['required', 'string'],
            'year' => ['required', 'date'],
            'url' => ['required', 'url'],
            'description' => ['required', 'string'],
            'parent_company' => ['required', 'string'],
            'industry' => ['required', 'string'],
            'notes' => ['required', 'string'],
            'is_alternative' => ['required', 'boolean'],
            'barcode' => ['required', 'string'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:90000'],
            'user_id' => ['required', Rule::exists('users', 'id')],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'city_id' => ['required', Rule::exists('cities', 'id')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth('api')->user()->id,
        ]);
    }
}
