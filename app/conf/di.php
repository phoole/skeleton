<?php

use Psr\Log\LogLevel;

/**
 * Dependency Injection
 */
return [
    // all service definitions go here
    'service' => [
        // cache
        'cache' => [
            'class' => '${cache.class}',
            'args' => ['${#fileAdaptor}', '${cache.ttl}'],
        ],
        'fileAdaptor' => [
            'class' => '${cache.file.class}',
            'args' => ['${cache.file.dir}', '${cache.file.hash.level}'],
        ],

        // router
        'router' => [
            'class' => '${route.router.class}',
            'args' => ['${route.routes}', '${#routeResolver}'], // load all routes
        ],
        'routeResolver' => [
            'class' => '${route.resolver.class}',
            'args' => [
                '${app.controller.namespace}',
                '${route.resolver.controller.suffix}',
                '${route.resolver.action.suffix}'
            ],
        ],

        // event
        'events' => [
            'class' => '${event.dispatcher.class}',
            'args' => ['${#eventProvider}'],
        ],
        'eventProvider' => [
            'class' => '${event.provider.class}',
            'after' => [
                ['loadListeners', '${event.listeners}'] // load all listeners
            ]
        ],

        // middleware
        'middleware' => [
            'class' => '${middleware.queue.class}',
            'args' => ['${#defaultResponse}'],
            'after' => [
                ['add', ['${#router}']],
            ],
        ],
        'defaultResponse' => [
            'class' => '${middleware.response.class}',
            'args' => ['404']
        ],

        // logger
        'logger' => [
            'class' => '${logger.class}',
            'args' => ['${ENV.APP_NAME}'], // set log channel to app name
            'after' => [
                ['addHandler', ['${#syslog}', LogLevel::WARNING]],
            ],
        ],
        'syslog' => [
            'class' => '${logger.handler.syslog.class}',
            'args' => ['${logger.handler.syslog.facility}', '${logger.handler.syslog.opts}'],
        ],
    ],

    // after methods for each object created in the container
    'after' => [
        // those ConfigAware
        ['setConfig', ['${#conf}']],
        // those loggerAware object will execute this
        ['setLogger', ['${#logger}']],
    ],
];