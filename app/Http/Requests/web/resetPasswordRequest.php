<?php

namespace App\Http\Requests\web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class resetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
