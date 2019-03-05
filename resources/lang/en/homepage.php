<?php

return [
    'header' => [
        'menu' => [
            'affiliate' => 'Affiliate Program',
            'login'     => 'Sign In',
            'logout'    => 'Logout',
        ],
    ],

    'payment' => [
        'title'       => 'Buy bitcoin<br/>with credit card',
        'description' => 'accepted here',
        'form'        => [
            'title'                     => 'BUY BITCOIN',
            'min_transaction'           => 'Minimal amount is <b>30 EUR</b>.',
            'bitcoin_field_placeholder' => 'Bitcoin address',
            'bitcoin_field_description' => 'BTC address must be <b>yours</b> and <b>under your full control</b>.',
        ],
    ],

    'processes' => [
        'fees'         => [
            'title' => 'REASONABLE FEES',
            'icon'  => 'icon-fees',
            'text'  => 'All fees below are already included in the current exchange rate'
                . '<br>- Exrate fee: 2%<br>- Processing fee: 10%',
        ],
        'verification' => [
            'title' => 'EASY VERIFICATION',
            'icon'  => 'icon-processing',
            'text'  => 'Payment process is pretty simple and takes just a few steps. No registration is needed.',
        ],
        'transactions' => [
            'title' => 'QUICK TRANSACTIONS',
            'icon'  => 'icon-time',
            'text'  => 'Our transactions take from 10 to 30 minutes in regular circumstances.',
        ],
        'support'      => [
            'title' => 'INSTANT SUPPORT',
            'icon'  => 'icon-support',
            'text'  => 'Feel free to contact <a href="mailto:support@exrate.cc" class="link">support@exrate.cc</a> '
                . 'should you have any questions or suggestions.',
        ],
    ],

    'limits' => [
        'title'       => 'Before continuing, please see the existing limits',
        'transaction' => [
            'title' => 'TRANSACTION',
            'text'  => 'from <b>&euro;30</b> to <b>&euro;10000</b>',
        ],
        'daily'       => [
            'title' => 'DAILY LIMIT',
            'text'  => 'up to <b>&euro;20000</b>',
        ],
        'monthly'     => [
            'title' => 'MONTHLY LIMIT',
            'text'  => 'up to <b>&euro;50000</b>',
        ],
    ],

    'buy_now' => [
        'title' => 'Buy Bitcoin with credit card',
        'text'  => 'In a few easy steps',
    ],

    'reviews' => [
        'title' => 'THOUSANDS OF USERS INTERNATIONALLY',
        'list'  => [
            'kirillstoks'     => [
                'author' => 'kirillstoks',
                'text'   => 'Thank you for a fast transaction.',
                'date'   => 'May 11, 2018, 09:08 AM',
            ],
            'miner_anarchist' => [
                'author' => 'MinerAnarchist',
                'text'   => 'Thank you guys, all came through smoothly',
                'date'   => 'July 10, 2018, 02:48 PM',
            ],
            'jey_moon'        => [
                'author' => 'JeyMoon',
                'text'   => 'Thanks for an honest and fast transaction, guys',
                'date'   => 'July 16, 2018, 11:25 AM',
            ],
        ],
    ],

    'footer' => [
        'menu' => [
            'terms'  => 'Terms of use',
            'policy' => 'AML Policy',
            'faq'    => 'FAQ',
        ],
    ],
];