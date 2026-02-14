<?php

namespace Framework\Router;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Delete extends Route
{
    public function __construct(string $path, string $middleware)
    {
        parent::__construct($path, $middleware, 'DELETE');
    }
}
