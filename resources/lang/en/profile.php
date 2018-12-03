<?php

return [
    'title' => 'My Account',

    'sidebar' => [
        'title' => 'Profile',
        'menu'  => [
            'home' => 'Home',
            'transactions' => 'My transactions',
        ],
    ],

    'labels' => [
        'btc' => [
            'title' => 'BTC address',
        ],
        'percentage' => [
            'title' => 'Percentage',
        ],
        'referral' => [
            'title' => 'Ref. link',
        ],

        'balance' => 'Balance',

        'transactions' => [
            'title' => 'My transactions',
            'model' => [
                'referer' => 'Referer url',
                'btc_address' => 'BTC address',
                'total' => 'Total (EUR)',
                'date' => 'Date',
            ],
        ],
    ],

    'settings' => [
        'title' => 'Account Settings',
    ],

    'messages' => [
        'transactions' => [
            'empty_collection' => 'You have not any transactions yet.',
        ],
    ],

    'actions' => [
        'profile' => 'Profile',
        'logout' => 'Logout',
    ],
];