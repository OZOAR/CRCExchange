<?php

return [
    'title' => 'My Account',

    'sidebar' => [
        'title' => 'Profile',
        'menu'  => [
            'home'         => 'Home',
            'transactions' => 'My transactions',
            'requests'     => 'My requests',
        ],
    ],

    'labels' => [
        'btc'        => [
            'title' => 'BTC address',
        ],
        'percentage' => [
            'title' => 'Percentage',
        ],
        'referral'   => [
            'title' => 'Ref. link',
        ],

        'balance'       => 'Balance',
        'request_total' => 'Total',

        'transactions' => [
            'title' => 'My transactions',
            'model' => [
                'referer'     => 'Referer url',
                'btc_address' => 'BTC address',
                'total'       => 'Total (EUR)',
                'date'        => 'Date',
            ],
        ],
    ],

    'tabs' => [
        'settings'              => [
            'title' => 'Account Settings',
        ],
        'receive_money_request' => [
            'title' => 'Output money',
        ],
    ],

    'messages' => [
        'transactions'          => [
            'empty_collection' => 'You have not any transactions yet.',
        ],
        'receive_money_request' => [
            'description' => 'Here you can place request to receive money to your profile BTC address.',
            'success'     => 'Your request to receive money has been sent.',
            'error'       => 'Your request to receive money cannot be sent. Try again later.',
        ],
    ],

    'actions' => [
        'profile' => 'Profile',
        'logout'  => 'Logout',
    ],
];