<?php

return [
    'title' => 'Dashboard',

    'sidebar' => [
        'title' => 'Dashboard',
        'menu'  => [
            'home' => 'Home',
            'transactions' => 'Transactions',
        ],
    ],

   'labels' => [
        'partners' => [
            'title' => 'Partners',
            'model' => [
                'name' => 'Name',
                'email' => 'Email',
                'percentage' => 'Percentage',
                'btc_address' => 'BTC address',
                'referral' => 'Referral URL',
            ],
        ],
        'transactions' => [
            'title' => 'Transactions',
            'model' => [
                'owner' => 'Partner',
                'referer' => 'Referer',
                'btc_address' => 'BTC address',
                'total' => 'Total (EUR)',
                'date' => 'Date',
            ],
        ],
    ],

    'messages' => [
        'partners' => [
            'empty_collection' => 'Partners are not registered.',
        ],
        'transactions' => [
            'empty_collection' => 'Transactions are not found.',
        ],
    ],

    'actions' => [
        'dashboard' => 'Dashboard',
        'profile'   => 'Profile',
        'logout'    => 'Logout',
    ],
];