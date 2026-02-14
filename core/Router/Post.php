<?php

namespace Framework\Router;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Post extends Route
{
    public function __construct(string $path, string $middleware)
    {
        parent::__construct($path, $middleware, 'POST');
    }
}
