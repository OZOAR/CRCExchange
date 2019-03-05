<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'        => 'These credentials do not match our records.',
    'throttle'      => 'Too many login attempts. Please try again in :seconds seconds.',
    'not_confirmed' => 'Your account is not confirmed by email.',
    'register'      => [
        'email' => [
            'sent' => 'Email for the registration request confirmation has sent.',
        ],
    ],

    'login' => [
        'title'   => 'Sign In',
        'form'    => [
            'email'       => 'E-Mail Address',
            'password'    => 'Password',
            'remember_me' => 'Remember Me',
        ],
        'sign_up' => 'Sign Up',
        'forgot'  => 'Forgot Your Password?',
    ],


    'registration' => [
        'title'       => 'Create new account',
        'description' => 'By clicking on Sign Up, you agree to <b><a href="/terms-and-privacy">terms and privacy policy.</a></b>.',
        'form'        => [
            'name'         => 'Name',
            'email'        => 'Email Address',
            'password'     => 'Password',
            'confirmation' => 'Confirm Password',
        ],
    ],
];
