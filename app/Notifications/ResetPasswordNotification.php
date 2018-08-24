<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
    /**
     * Create a notification instance.
     *
     * @param  string $token
     *
     * @return void
     */
    public function __construct($token)
    {
        parent::__construct($token);
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(config('app.mail_from'), trans('mail.from'))
            ->subject(trans('mail.reset_password.subject'))
            ->line(trans('mail.reset_password.body'))
            ->action(
                trans('mail.reset_password.button'),
                url(config('app.url') . route('password.reset', $this->token, false)))
            ->line(trans('mail.salutation_bottom'))
            ->markdown('mail.password.reset');
    }
}
