<?php

return [
    'title' => 'Dashboard',

    'sidebar' => [
        'title' => 'Dashboard',
        'menu'  => [
            'home' => 'Home',
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
    ],

    'messages' => [
        'partners' => [
            'empty_collection' => 'Partners are not registered.',
        ],
    ],

    'actions' => [
        'dashboard' => 'Dashboard',
        'profile'   => 'Profile',
        'logout'    => 'Logout',
    ],
];