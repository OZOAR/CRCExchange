<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Helpers\TokenBroker;
use App\Mail\RegisterConfirmationMail;
use Illuminate\Support\Facades\Mail;

class SendRegisteredNotification
{
    /**
     * Handle the event.
     *
     * @param  Registered $event
     *
     * @return void
     */
    public function handle(Registered $event)
    {
        \Log::info('Event successfully listened: ', [$event]);
        $user = $event->getUser();
        $request = $event->getRequest();

        Mail::to($user)->send(new RegisterConfirmationMail($user, $request));
    }
}
