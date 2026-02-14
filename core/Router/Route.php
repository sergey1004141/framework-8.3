<?php

namespace Framework\Router;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Route
{
    public function __construct(
        public string $path,
        public string|array $middleware = [],
        public string|array $method = 'GET'
    ) {}

}