<?php

use Phoole\Di\Service;
use Phoole\Di\Container;

/**
 * Dependency Injection
 */

/**
 * @param  object    $object
 * @param  Container $container
 * @return bool
 */
$tester = function(object $object, Container $container): bool {
    return TRUE;
};

/**
 * @param  object $object
 */
$logger = function(object $object) {
    $logger = Service::get('logger');
    $logger->info("Object " . get_class($object) . " created");
};

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
                '${app.controller.suffix}',
                '${app.controller.action.suffix}'
            ],
        ],

        // event
        'eventDispatcher' => [
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
                ['add', [ // add middlewares
                          '${#router}'
                ]
                ],
            ],
        ],
        'defaultResponse' => [
            'class' => '${middleware.response.class}',
            'args' => ['404']
        ],

        // logger
        'logger' => [
            'class' => '${logger.class}',
            'args' => [getenv('APP_NAME')], // set log channel to app name
            'after' => [
                ['addHandler', ['${#syslog}', LogLevel::WARNING]],
            ],
        ],
        'syslog' => [
            'class' => '${logger.handler.syslog.class}',
            'args' => ['${logger.handler.syslog.facility}', '${logger.handler.syslog.opts}'],
        ],
    ],

    // common methods for each object created in the container
    'common' => [
        // log object creation in the container
        [$tester, $logger]
    ],
];
