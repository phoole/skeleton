<?php

use Phoole\Cache\Cache;
use Phoole\Cache\Adaptor\FileAdaptor;

/**
 * cache related configurations
 */
return [
    // cache global settings
    'class' => Cache::class,
    'ttl' => 86400,

    // file adaptor settings
    'file.class' => FileAdaptor::class,
    'file.dir' => '${ENV.APP_TEMP_DIR}' . \DIRECTORY_SEPARATOR . 'cache',
    'file.hash.level' => 2,
];