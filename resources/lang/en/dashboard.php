<?php

return [
    'title' => 'Dashboard',

    'sidebar' => [
        'title' => 'Dashboard',
        'menu'  => [
            'home' => 'Home',
            'transactions' => 'Transactions',
            'requests' => 'Requests',
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
        'requests' => [
            'title' => 'Requests',
            'model' => [
                'user'       => 'Partner',
                'total'      => 'Total (BTC)',
                'status'     => 'Status',
                'created_at' => 'Created at',
            ],
            'actions' => 'Actions',
        ],
    ],

    'messages' => [
        'partners' => [
            'empty_collection' => 'Partners are not registered.',
        ],
        'transactions' => [
            'empty_collection' => 'Transactions are not found.',
        ],
        'requests' => [
            'empty_collection' => 'Requests to receive money are not sent yet.',
        ],
    ],

    'actions' => [
        'dashboard' => 'Dashboard',
        'profile'   => 'Profile',
        'logout'    => 'Logout',
    ],
];