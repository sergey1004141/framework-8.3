<?php

namespace Framework\Router;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Put extends Route
{
    public function __construct(string $path, string $middleware)
    {
        parent::__construct($path, $middleware, 'PUT');
    }
}
