<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:256',
            'email' => 'required|string|email|max:256|unique:customers|unique:restaurants',
            'phone' => 'required|string|max:256',
            'address' => 'required|string|max:256',
            'diet-type' => ['required', Rule::in(['vegetarian', 'non-vegetarian'])],
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
