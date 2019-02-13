<?php

return [
    'header' => [
        'menu' => [
            'faq'      => 'FAQ',
            'privacy'  => 'AML/KYC',
            'terms'    => 'Terms of use',
            'login'    => 'Sign in',
            'register' => 'Register',
            'logout'   => 'Logout',
        ],
    ],

    'payment' => [
        'title'       => 'Buy bitcoin<br/>with credit card',
        'description' => 'accepted here',
        'form'        => [
            'title'                     => 'BUY BITCOIN',
            'min_transaction'           => 'Minimal amount is <b>30 EUR</b>.',
            'bitcoin_field_placeholder' => 'Bitcoin address',
            'bitcoin_field_description' => 'BTC address must be <b>yours</b> and <b>under your full control</b>.',
        ],
    ],

    'reviews' => [
        'title' => 'Reviews',
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
        ],
    ],

    'limits' => [
        'title'       => 'Before continuing, please see the existing limits',
        'transaction' => [
            'title' => 'TRANSACTION',
            'text'  => 'from <b>&euro;30</b> to <b>&euro;10000</b>',
        ],
        'daily'       => [
            'title' => 'DAILY LIMIT',
            'text'  => 'up to <b>&euro;20000</b>',
        ],
        'monthly'     => [
            'title' => 'MONTHLY LIMIT',
            'text'  => 'up to <b>&euro;50000</b>',
        ],
    ],

    'footer' => [
        'menu' => [
            'privacy'  => 'AML/KYC',
            'terms'    => 'Terms of use',
        ]
    ],
];