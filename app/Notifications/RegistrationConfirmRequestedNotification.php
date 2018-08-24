<?php

namespace App\Notifications;

use App\Models\RegistrationRequest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RegistrationConfirmRequestedNotification extends Notification
{
    use Queueable;

    protected $user;
    protected $request;

    /**
     * Create a new notification instance.
     *
     * @param User                $user
     * @param RegistrationRequest $request
     */
    public function __construct(User $user, RegistrationRequest $request)
    {
        $this->user = $user;
        $this->request = $request;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = $this->user;
        $supportEmail = config('app.mail_from');
        $projectName = config('app.name');
        $telegram = config('app.telegram');
        $twitter = config('app.twitter');
        $website = config('app.url');

        $attributes = [
            'user', 'supportEmail', 'projectName', 'telegram',
            'twitter', 'website', 'registrationLink',
        ];

        \Log::debug('Confirmation email built with: ', compact($attributes));

        return (new MailMessage)
            ->from(config('app.mail_from'), trans('mail.from'))
            ->subject(trans('mail.registration_confirmation.subject'))
            ->line(trans('mail.registration_confirmation.body', ['projectName' => $projectName]))
            ->action(
                trans('mail.registration_confirmation.button'),
                url(route('auth.register.confirm', ['token' => $this->request->getToken()])))
            ->line(trans('mail.salutation_bottom'))
            ->markdown('mail.registration.requested', compact($attributes));
    }
}
