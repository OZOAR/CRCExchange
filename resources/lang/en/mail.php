<?php

return [
    'from'                      => 'CRCExchange Support',
    'salutation'                => 'Regards',
    'salutation_bottom'         => 'Thank you for your support!',

    /**
     * Reset password mail messages.
     */
    'reset_password'            => [
        'subject' => 'Reset password',
        'welcome' => 'Hello,',

        'body'   => 'Please click the button below to reset your password:',
        'button' => 'Reset Password',

        'subcopy' => 'If you’re having trouble clicking the ":actionText" button, copy and paste the URL below into your web browser:',
    ],

    /**
     * Registration confirmation mail messages.
     */
    'registration_confirmation' => [
        'subject' => 'Email confirmation',
        'welcome' => 'Hello :username,',

        'body'   => 'Thank you for signing up with :projectName. Please click the button below for email confirmation:',
        'button' => 'Confirm registration',

        'subcopy' => 'If you’re having trouble clicking the ":actionText" button, copy and paste the URL below into your web browser:',

        'contacts' => 'If you are not an intended recipient of this email, please contact us via :supportEmail<br/><br/>'
            . '<b>Contacts Info:</b><br/>'
            . '<b>Email:</b> :supportEmail<br/>'
            . '<b>Telegram:</b> :telegram<br/>'
            . '<b>Twitter:</b> :twitter<br/>'
            . ':website<br/>',
    ],
];
