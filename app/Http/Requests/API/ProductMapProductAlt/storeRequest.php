<?php

namespace App\Http\Requests\API\ProductMapProductAlt;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'product_id' => ['required',Rule::exists('products','id')],
            'alternative_id' => ['required', 'array'],
            'alternative_id.*' => ['required',Rule::exists('product_alternatives','id')],
        ];
    }
}
