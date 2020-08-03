<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackForm extends Model
{
    protected $fillable = [
        'email', 'feedback',
    ];
}
