<?php

use Phoole\Middleware\Queue;
use GuzzleHttp\Psr7\Response;

return [
    // queue classname
    'queue.class' => Queue::class,

    // default response class
    'response.class' => Response::class,
];