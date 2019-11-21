<?php

use Phoole\Route\Router;
use Phoole\Route\Resolver\DefaultResolver;

/**
 * routing stuff
 */
return [
    /**
     * router class name
     */
    'router.class' => Router::class,

    /**
     * controller/action name resolver
     */
    'resolver' => [
        'class' => DefaultResolver::class,
        'action.suffix' => '${app.action.suffix}',
        'controller.suffix' => '${app.controller.suffix}',
    ],

    // routes goes here
    'routes' => [
        /**
         * custom routes definitions goes here
         */
        ['GET/POST', '/helloWorld', ['hello', 'helloWorld']],

        /**
         * auto resolving. e.g. resolve `/index/index` to
         * ['indexController', 'indexAction']
         */
        ['GET/POST', '/{controller:xd}/{action:xd}', ['${controller}', '${action}']],
    ],
];