<?php

namespace App\Http\Requests\web;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class registerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required','email', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()]
        ];
    }
}
