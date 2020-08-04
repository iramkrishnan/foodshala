<?php

namespace App\Providers;

use App\Events\FeedbackFormEvent;
use App\Events\NewUserRegisteredEvent;
use App\Events\OrderPlacedEvent;
use App\Listeners\NotifyAdmin;
use App\Listeners\SendConfirmationMail;
use App\Listeners\SendWelcomeMail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        FeedbackFormEvent::class => [
            NotifyAdmin::class,
        ],

        NewUserRegisteredEvent::class => [
            NotifyAdmin::class,
            SendWelcomeMail::class,
        ],

        OrderPlacedEvent::class => [
            SendConfirmationMail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
