<?php

namespace App\Mail;

use App\Models\RegistrationRequest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $request;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $supportEmail = config('app.mail_from');
        $projectName = config('app.name');
        $telegram = config('app.telegram');
        $twitter = config('app.twitter');
        $website = config('app.url');

        $registrationLink = route('auth.register.confirm', ['token' => $this->request->getToken()]);

        $attributes = [
            'user', 'supportEmail', 'projectName', 'telegram',
            'twitter', 'website', 'registrationLink',
        ];

        \Log::debug('Build confirmation email with: ', compact($attributes));

        return $this->from(config('app.mail_from'), trans('mail.from'))
            ->subject(trans('mail.subject'))
            ->view('mail.registration.confirmation')
            ->with(compact($attributes));
    }
}
