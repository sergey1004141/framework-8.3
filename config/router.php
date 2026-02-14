<?php

use App\Controllers\ContactController;
use App\Controllers\HomeController;
use Framework\Application;

/** @var Application $app */

$app->router->add('/', [HomeController::class, 'index'], ['post', 'get']);

$app->router->get('/test', [HomeController::class, 'test']);
$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->get('/contact/(?P<slug>[0-9]+)/?', [ContactController::class, 'contact']);
