<?php

namespace Framework\Router;
#[\Attribute(\Attribute::TARGET_METHOD)]
class Get extends Route
{
    public function __construct(string $path, array $middleware = [])
    {
        parent::__construct($path, $middleware, 'GET');
    }
}