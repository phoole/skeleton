<?php

use Phoole\Middleware\Queue;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

return [
    // queue classname
    'queue.class' => Queue::class,

    // default handler
    'handler.default' => function(RequestInterface $request) {
        return new Response(404);
    },

    // uri router middleware (object in container)
    'handler.router' => '${#router}',

    // the middleware queue
    'queue.all' => [
        '${middleware.handler.router}',
    ],
];