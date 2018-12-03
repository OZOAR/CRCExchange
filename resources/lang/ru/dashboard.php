<?php

return [
    'title' => 'Панель администратора',

    'sidebar' => [
        'title' => 'Админ-панель',
        'menu'  => [
            'home' => 'Главная',
            'transactions' => 'Транзакции'
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
        'transactions' => [
            'title' => 'Транзакции',
            'model' => [
                'owner' => 'Партнер',
                'referer' => 'Реферал',
                'btc_address' => 'BTC адрес',
                'total' => 'Сумма (EUR)',
                'date' => 'Дата',
            ],
        ],
    ],

    'messages' => [
        'partners' => [
            'empty_collection' => 'Пока партнеров не зарегистрировано.',
        ],
        'transactions' => [
            'empty_collection' => 'Транзакций пока нет.',
        ],
    ],

    'actions' => [
        'dashboard' => 'Админ-панель',
        'profile'   => 'Профиль',
        'logout'    => 'Выйти',
    ],
];