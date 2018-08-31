<?php

return [
    'title' => 'Панель администратора',

    'sidebar' => [
        'title' => 'Админ-панель',
        'menu'  => [
            'home' => 'Главная',
        ],
    ],

    'labels' => [
        'partners' => [
            'title' => 'Партнеры',
            'model' => [
                'name' => 'Имя',
                'email' => 'Email',
                'percentage' => 'Процент',
                'btc_address' => 'BTC адрес',
                'referral' => 'Реф. ссылка',
            ],
        ],
    ],

    'messages' => [
        'partners' => [
            'empty_collection' => 'Пока партнеров не зарегистрировано.',
        ],
    ],

    'actions' => [
        'dashboard' => 'Админ-панель',
        'profile'   => 'Профиль',
        'logout'    => 'Выйти',
    ],
];