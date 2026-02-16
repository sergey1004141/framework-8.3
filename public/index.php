<?php

use Framework\Application;

require_once dirname(__DIR__) . '/config/config.php';

if (config['debug']) {
    $start_framework = microtime(true);
}

if (PHP_MAJOR_VERSION < 8) {
    die('Require PHP version is 8.0+');
}

require_once ROOT . '/vendor/autoload.php';
require_once HELPERS . '/helpers.php';

$app = new Application();
$app->run();

echo "<div class='debug_panel'>";
    dump("Time: " . (microtime(true) - $start_framework) . " seconds");
echo "</div>";
