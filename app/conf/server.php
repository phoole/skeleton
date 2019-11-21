<?php

return [
    'http' => [
        'host' => '0.0.0.0',
        'port' => 9501,
        'callback' => ['className', 'onRequest'],
        'docRoot' => '${APP_DOC_ROOT}',
    ],
];