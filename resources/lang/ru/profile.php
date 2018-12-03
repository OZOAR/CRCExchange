<?php

return [
    'title' => 'Личный кабинет',

    'sidebar' => [
        'title' => 'Профиль',
        'menu'  => [
            'home'         => 'Главная',
            'transactions' => 'Мои транзакции',
        ],
    ],

    'labels' => [
        'btc'          => [
            'title' => 'BTC адрес',
        ],
        'percentage'   => [
            'title' => 'Процент',
        ],
        'referral'     => [
            'title' => 'Реф. ссылка',
        ],
        'transactions' => [
            'title' => 'Мои транзакции',
            'model' => [
                'referer' => 'Реферальная ссылка',
                'btc_address' => 'BTC адрес',
                'total' => 'Сумма (EUR)',
                'date' => 'Дата',
            ],
        ],
    ],

    'settings' => [
        'title' => 'Настройка аккаунта',
    ],

    'messages' => [
        'transactions' => [
            'empty_collection' => 'Пока вы не совершили ни одной тразакции.',
        ],
    ],

    'actions' => [
        'profile' => 'Профиль',
        'logout'  => 'Выйти',
    ],
];