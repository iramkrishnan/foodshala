<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'feedback' => 'required',
        ];
    }
}
