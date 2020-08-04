<?php

namespace App\Providers;

use App\Events\FeedbackFormEvent;
use App\Listeners\NotifyAdmin;
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

        \App\Events\NewUserRegisteredEvent::class => [
            \App\Listeners\NotifyAdmin::class,
            \App\Listeners\SendWelcomeMail::class,
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
