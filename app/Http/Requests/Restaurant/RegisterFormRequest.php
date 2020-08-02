<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:restaurants|unique:customers',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cuisine' => ['required', Rule::in(['vegetarian', 'non-vegetarian'])],
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image',
        ];
    }
}
