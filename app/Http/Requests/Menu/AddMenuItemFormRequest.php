<?php

namespace App\Http\Requests\Menu;

use App\Rules\VegRestaurantCannotHaveNonVegMenuItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddMenuItemFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'menu_item' => 'required|string',
            'price' => 'required|int|min:1',
            'type' => ['required', Rule::in(['vegetarian', 'non-vegetarian']), new VegRestaurantCannotHaveNonVegMenuItem],
            'description' => 'nullable|string|max:256',
            'image' => 'nullable|image',
        ];
    }
}
