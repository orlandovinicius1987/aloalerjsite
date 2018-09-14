<?php

return [
    'title' => 'Laravel Health Check Panel',

    'resources' => [
        'path' => config_path('health/resources'),

        'enabled' => PragmaRX\Health\Support\Constants::RESOURCES_ENABLED_ALL,
    ],

    'sort_by' => 'slug',

    'cache' => [
        'minutes' => config('app.debug') ? false : true, // false = disabled

        'key' => 'health-resources',
    ],

    'database' => [
        'enabled' => true,

        'graphs' => [
            'enabled' => true,

            'height' => 90,
        ],

        'max_records' => 30,
    ],
];
