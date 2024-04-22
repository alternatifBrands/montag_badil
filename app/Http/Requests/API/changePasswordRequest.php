<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class changePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'current_password' => ['required','string'],
            'new_password'=>['required','confirmed',Rules\Password::defaults()],
        ];
    }
}
