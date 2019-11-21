<?php

use Phoole\Logger\Logger;
use Phoole\Logger\Handler\SyslogHandler;

/**
 * logger stuff
 */
return [
    'class' => Logger::class,

    // syslog handler
    'handler.syslog.class' => SyslogHandler::class,
    'handler.syslog.facility' => \LOG_USER,
    'handler.syslog.opts' => \LOG_PID
];