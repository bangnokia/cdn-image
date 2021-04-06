<?php

return [
    // Default service
    'default' => 'statically',

    'services' => [
        // Statically is the free cdn, so we dont have to config any api key here
        'statically' => [
            'url' => 'https://cdn.statically.io'
        ],

        // Cloudimge wip
        'cloudimage' => []
    ]
];
