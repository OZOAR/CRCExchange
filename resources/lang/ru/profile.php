<?php

return [
    'title' => 'Личный кабинет',

    'sidebar' => [
        'title' => 'Профиль',
        'menu'  => [
            'home'         => 'Главная',
            'transactions' => 'Мои транзакции',
            'requests'     => 'Запросы на вывод',
        ],
    ],

    'labels' => [
        'btc'        => [
            'title' => 'BTC адрес',
        ],
        'percentage' => [
            'title' => 'Процент',
        ],
        'referral'   => [
            'title' => 'Реф. ссылка',
        ],

        'balance'       => 'Баланс',
        'request_total' => 'Сумма',

        'transactions' => [
            'title' => 'Мои транзакции',
            'model' => [
                'referer'     => 'Реферальная ссылка',
                'btc_address' => 'BTC адрес',
                'total'       => 'Сумма (EUR)',
                'date'        => 'Дата',
            ],
        ],

        'requests' => [
            'title' => 'Мои запросы на вывод',
            'model' => [
                'total'      => 'Сумма (BTC)',
                'status'     => 'Статус',
                'created_at' => 'Дата создания',
            ],
        ],
    ],

    'tabs' => [
        'settings'              => [
            'title' => 'Настройка аккаунта',
        ],
        'receive_money_request' => [
            'title' => 'Вывод средств',
        ],
    ],

    'messages' => [
        'transactions'          => [
            'empty_collection' => 'Пока вы не совершили ни одной тразакции.',
        ],
        'requests' => [
            'empty_collection' => 'Вы пока не оставляли запросы на вывод денег.',
            'description'      => 'Здесь вы можете оставить запрос на вывод средств на привязанный биткоин-адрес.',
            'success'          => 'Ваш запрос на вывод денег отправлен.',
            'error'            => 'Запрос на вывод денег не может быть отправлен. Попробуйте позже.',
        ],
    ],

    'actions' => [
        'profile' => 'Профиль',
        'logout'  => 'Выйти',
    ],
];