<?php

namespace App\Http\Requests\web;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class forgetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email'=>['required','email',Rule::exists('users','email')]
        ];
    }
}
