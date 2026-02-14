<?php

use Framework\Application;
use Framework\Request;
use Framework\Response;
use Framework\View;

function app(): Application
{
    return Application::$app;
}

function request(): Request
{
    return app()->request;
}

function response(): Response
{
    return app()->response;
}

function view(string $view = '', array $data = [], $layout = null): View
{
    if ($view) {
        app()->view->render($view, $data, $layout);
    }
    return app()->view;
}

function abort(string $error = '', int $code = 404): View
{
    response()->setResponseCode($code);
    return view("errors/{$code}", ['error' => $error], false);
}

function base_url($path = ''): string
{
    return PATH . $path;
}

