<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class AddMenuItemFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'menu_item' => 'required|string',
        ];
    }
}
