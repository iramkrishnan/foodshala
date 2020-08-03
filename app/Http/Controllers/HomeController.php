<?php

namespace App\Http\Controllers;

use App\Events\FeedbackFormEvent;
use App\FeedbackForm;
use App\Http\Requests\FeedbackFormRequest;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function postContactForm(FeedbackFormRequest $request)
    {
        $feedback = FeedbackForm::create([
            'email' => $request->validated()['email'],
            'feedback' => $request->validated()['feedback'],
        ]);

        event(new FeedbackFormEvent($feedback));

        return redirect()->back();
    }
}
