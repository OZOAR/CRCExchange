<?php

return [
    'header' => [
        'menu' => [
            'faq'      => 'FAQ',
            'login'    => 'Авторизация',
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

    'processes' => [
        'fees'         => [
            'title' => 'НИЗКИЕ КОМИССИИ',
            'icon'  => 'icon-fees',
            'text'  => 'Все комиссии, указанные ниже, уже включены в текущий курс обмена.'
                . '<br>- Комиссия Exrate: 2%<br>- Сервисный сбор: 10%',
        ],
        'verification' => [
            'title' => 'ПРОСТАЯ ВЕРИФИКАЦИЯ',
            'icon'  => 'icon-processing',
            'text'  => 'Процесс покупки включает всего несколько шагов. Прохождения регистрации не требуется.',
        ],
        'transactions' => [
            'title' => 'БЫСТРЫЙ ОБМЕН',
            'icon'  => 'icon-time',
            'text'  => 'Средняя скорость проведения транзакции - от 10 до 30 минут.',
        ],
        'support'      => [
            'title' => 'СЛУЖБА ПОДДЕРЖКИ',
            'icon'  => 'icon-support',
            'text'  => 'В случае возникновения вопросов или предложений по улучшению сервиса - напишите нам на почту '
                . '<a href="mailto:support@exrate.cc" class="link">support@exrate.cc</a>.',
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

    'buy_now' => [
        'title' => 'Покупка биткойнов при помощи банковской карты',
        'text'  => 'Быстро и просто',
    ],

    'reviews' => [
        'title' => 'ТЫСЯЧИ ДОВОЛЬНЫХ КЛИЕНТОВ ПО ВСЕМУ МИРУ',
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

    'footer' => [
        'menu' => [
            'terms'  => 'Правила использования',
            'policy' => 'Политика AML',
            'faq'    => 'FAQ',
        ],
    ],
];