<?php

namespace App\Http\Controllers;

use App\Events\FeedbackFormEvent;
use App\Http\Requests\FeedbackFormRequest;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function postContactForm(FeedbackFormRequest $request)
    {
        $data = $request->validated();

        event(new FeedbackFormEvent($data));

        return redirect()
            ->back()
            ->with('message', "Thank you for your feedback, We'll be in touch");
    }
}
