<?php

namespace App\Http\Requests\API;

use App\Enums\UserType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class updateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $userId = auth()->id();
        $cases = array_map(fn($case) => $case->value, UserType::cases());
        return [
            'name' => ['sometimes', 'string', 'min:3', 'max:50'],
            'email'=>['sometimes','string',Rule::unique('users')->ignore($userId)],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:90000'],
            'type' => ['sometimes', 'string', 'in:' . implode(',', $cases)],
            'country_id'=>['sometimes',Rule::exists('countries','id')],
        ];
    }
}
