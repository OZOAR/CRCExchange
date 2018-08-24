<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Notifications\RegistrationConfirmRequestedNotification;

class SendRegisteredNotificationListener
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

        $user->notify(new RegistrationConfirmRequestedNotification($user, $request));
    }
}
