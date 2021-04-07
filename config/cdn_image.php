<?php

return [
    'default' => 'statically',

    // If this option set to true, it will try to
    'force_cdn' => false,

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
