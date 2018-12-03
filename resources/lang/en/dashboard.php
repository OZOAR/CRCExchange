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
        'receive_money_request' => [
            'empty_collection' => 'You have not sent any requests to receive money yet.',
            'description'      => 'Here you can place request to receive money to your profile BTC address.',
            'success'          => 'Your request to receive money has been sent.',
            'error'            => 'Your request to receive money cannot be sent. Try again later.',
        ],
    ],

    'actions' => [
        'dashboard' => 'Dashboard',
        'profile'   => 'Profile',
        'logout'    => 'Logout',
    ],
];