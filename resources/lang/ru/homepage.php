<?php

return [
    'header' => [
        'menu' => [
            'faq'      => 'FAQ',
            'privacy'  => 'Политика конфиденциальности',
            'terms'    => 'Правила использования',
            'login'    => 'Авторизация',
            'register' => 'Регистрация',
            'logout'   => 'Выйти',
        ],
    ],

    'payment' => [
        'title'       => 'Покупка биткоинов<br/>при помощи банковской карты',
        'description' => '',
        'form'        => [
            'title'                     => 'КУПИТЬ BITCOIN',
            'min_transaction'           => 'Минимальный платеж - <b>30 евро</b>.',
            'bitcoin_field_placeholder' => 'Bitcoin адрес',
            'bitcoin_field_description' => 'Данный BTC кошелек должен быть <b>Вашим</b> и находиться <b>под Вашим '
                . 'полным контролем</b>.',
        ],
    ],

    'reviews' => [
        'title' => 'Отзывы',
        'list'  => [
            'kirillstoks'     => [
                'author' => 'kirillstoks',
                'text'   => 'Спасибо за быструю сделку.',
                'date'   => '11 мая 2018, 09:08',
            ],
            'miner_anarchist' => [
                'author' => 'MinerAnarchist',
                'text'   => 'Спасибо, отличные ребята, не обманули',
                'date'   => '10 июля 2018, 14:48',
            ],
            'jey_moon'        => [
                'author' => 'JeyMoon',
                'text'   => 'спасибо ребятам за честную и быструю сделку. респект',
                'date'   => '16 июля 2018, 11:25',
            ],
        ],
    ],

    'limits' => [
        'title'       => 'Перед осуществлением транзакции, ознакомьтесь с установленными лимитами',
        'transaction' => [
            'title' => 'РАЗМЕР ТРАНЗАКЦИИ',
            'text'  => 'от <b>&euro;30</b> до <b>&euro;10000</b>',
        ],
        'daily'       => [
            'title' => 'ЛИМИТ НА ДЕНЬ',
            'text'  => 'до <b>&euro;20000</b>',
        ],
        'monthly'     => [
            'title' => 'ЛИМИТ НА МЕСЯЦ',
            'text'  => 'до <b>&euro;50000</b>',
        ],
    ],

    'footer' => [
        'menu' => [
            'privacy' => 'Политика конфиденциальности',
            'terms'   => 'Правила использования',
        ],
    ],
];