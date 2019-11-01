<?php

use Phoole\Route\Router;
use Phoole\Route\Resolver\DefaultResolver;

/**
 * routing stuff
 */
return [
    // classnames
    'router.class' => Router::class,
    'resolver.class' => DefaultResolver::class,

    // routes goes here
    'routes' => [
        ['GET/POST', '/helloWorld', ['hello', 'helloWorld']],
    ],
];