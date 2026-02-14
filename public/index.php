<?php

use Framework\Application;

$start_framework = microtime(true);

if (PHP_MAJOR_VERSION < 8) {
    die('Require PHP version is 8.0+');
}

require_once dirname(__DIR__) . '/config/config.php';
require_once ROOT . '/vendor/autoload.php';
require_once HELPERS . '/helpers.php';

$app = new Application();
require_once CONFIG . '/router.php';
$app->run();

dump("Time: " . (microtime(true) - $start_framework));