<?php

use Psr\Log\LogLevel;
use Phoole\Logger\Logger;
use Phoole\Logger\Handler\SyslogHandler;

/**
 * logger stuff
 */
return [
    'class' => Logger::class,

    // all the handlers
    'handler.all' => [
        ['addHandler', ['${#syslog}', LogLevel::WARNING]],
    ],

    // syslog handler
    'handler.syslog.class' => SyslogHandler::class,
    'handler.syslog.facility' => \LOG_USER,
    'handler.syslog.opts' => \LOG_PID
];