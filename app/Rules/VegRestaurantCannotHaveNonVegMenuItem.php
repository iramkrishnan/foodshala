<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VegRestaurantCannotHaveNonVegMenuItem implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return request()->user()->cuisine == 'vegetarian' ? $value == 'vegetarian' : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return request()->user()->name . ' is registered as a Pure Veg Restaurant';
    }
}
