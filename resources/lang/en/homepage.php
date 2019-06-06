<?php

return [
    'header' => [
        'menu'         => [
            'affiliate' => 'Affiliate Program',
            'login'     => 'Sign In',
            'logout'    => 'Logout',
        ],
        'account_link' => 'My Account',
    ],


    'page' => [
        'title'       => 'Exrate: buy cryptocurrency using bank card',
        'description' => 'Best exchange rates for bitcoin, litecoin, dash, ethereum, eos, ripple',
    ],


    'payment' => [
        'title' => 'Buy cryptocurrency<br/>with credit card',
        'form'  => [
            'title'                     => 'BUY CRYPTOCURRENCIES',
            'min_transaction'           => 'Minimal amount is ',
            'bitcoin_field_placeholder' => 'Wallet Address',
            'email_field_placeholder'   => 'Email',
            'bitcoin_field_description' => 'Address must be <b>under your full control</b> and <b>correspond the cryptocurrency you purchase</b>.',
            'email_field_description'   => 'We need your email address to report the status of the purchase.',
            'loading_text'              => 'Loading rates, please wait. It`s wouldn`t take a lot of time.',
            'loading_error_text'        => 'Something went wrong. Try again later.',
        ],
    ],

    'processes' => [
        'title'        => 'Our features',
        'fees'         => [
            'title' => 'REASONABLE FEES',
            'icon'  => 'icon-fees',
            'text'  => 'All fees below are already included in the current exchange rate'
                . '<br>- Exrate fee: 5%<br>- Processing fee: 5%',
        ],
        'verification' => [
            'title' => 'EASY VERIFICATION',
            'icon'  => 'icon-processing',
            'text'  => 'Payment process is pretty simple and takes just a few steps. No registration is needed.',
        ],
        'transactions' => [
            'title' => 'QUICK TRANSACTIONS',
            'icon'  => 'icon-time',
            'text'  => 'Our transactions take from 10 to 30 minutes in regular circumstances.',
        ],
        'support'      => [
            'title' => 'INSTANT SUPPORT',
            'icon'  => 'icon-support',
            'text'  => 'Feel free to contact <a href="mailto:support@exrate.cc" class="link">support@exrate.net</a> '
                . 'should you have any questions or suggestions.',
        ],
    ],

    'limits' => [
        'title'       => 'Before continuing, please see existing limits:',
        'transaction' => [
            'title' => 'TRANSACTION',
            'text'  => 'from <b>&dollar;30</b> to <b>&dollar;6,000</b>',
        ],
        'daily'       => [
            'title' => 'DAILY LIMIT',
            'text'  => 'up to <b>&dollar;10,000</b>',
        ],
        'monthly'     => [
            'title' => 'MONTHLY LIMIT',
            'text'  => 'up to <b>&dollar;30,000</b>',
        ],
    ],

    'buy_now' => [
        'title'    => 'Join our Affiliate Program',
        'text'     => 'Place an affiliate link on your website, blog or social media profile. Get 50% of our revenue from every transaction made.',
        'contacts' => 'Contact us at ',
    ],

    'reviews' => [
        'title' => 'THOUSANDS OF USERS INTERNATIONALLY',
        'list'  => [
            'kirillstoks'     => [
                'author' => 'kirillstoks',
                'text'   => 'Thank you for a fast transaction.',
                'date'   => 'May 11, 2018, 09:08 AM',
            ],
            'miner_anarchist' => [
                'author' => 'MinerAnarchist',
                'text'   => 'Thank you guys, all came through smoothly',
                'date'   => 'July 10, 2018, 02:48 PM',
            ],
            'jey_moon'        => [
                'author' => 'JeyMoon',
                'text'   => 'Thanks for an honest and fast transaction, guys',
                'date'   => 'July 16, 2018, 11:25 AM',
            ],
            'jennymitchell'   => [
                'author' => 'jennymitchell',
                'text'   => 'Tried with different cards, everything works great.',
                'date'   => 'November 23, 2018, 04:01 PM',
            ],
        ],
    ],

    'footer' => [
        'menu' => [
            'information' => 'Information',
            'contacts'    => 'Contacts',
            'worktime'    => 'Office hours',
            'exchange'    => [
                'title' => 'Exchanges:',
                'time'  => '24-h/7-day',
            ],
            'support'     => [
                'title' => 'Support:',
                'time'  => '9:00 - 22:00',
            ],
            'terms'       => 'Terms of use',
            'policy'      => 'AML Policy',
            'faq'         => 'FAQ',
            'about'       => 'About and Contacts',
            'address'     => 'Platform for quick purchase of cryptocurrency using debit or credit cards (bitcoin, litecoin, eos, bitcoin cash, ethereum, dash, ripple). Fast transfer and great exchange rate. We accept Visa and MC debit/credit cards. Purchase is available in USD, euro, RUB and converted currencies.',
        ],
    ],
];