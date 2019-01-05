<?php

return [
    'api' => [
        'url'     => env('EXCHANGER_API_URL'),
        'prefix'  => env('EXCHANGER_API_PREFIX', 'api'),
        'version' => env('EXCHANGER_API_VERSION', 'v1'),
        'token'   => env('EXCHANGER_API_KEY'),
    ],
];