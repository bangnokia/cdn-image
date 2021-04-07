<?php

return [
    'default' => 'statically',

    'services' => [
        'statically' => [
            'domain' => 'cdn.statically.io'
        ],

        'cloud_image' => [
            'domain'  => 'cloudimg.io',
            'token'   => env('CLOUD_IMAGE_TOKEN'),
            'version' => env('CLOUD_IMAGE_VERSION', 'v7')
        ]
    ]
];
