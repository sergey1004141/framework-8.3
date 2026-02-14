<?php

namespace Framework;

use Buggregator\Trap\Config\Server\App;
use Buggregator\Trap\Handler\Router\Attribute\Route;

class Router
{
    protected $routes = [];

    protected $route_params = [];

    public function __construct(
        protected Request  $request,
        protected Response $response
    ) {}

    public function add($path, $callback, $method = 'GET'): self {
        $path = '/' . trim($path, '/');
        $method = is_array($method) ? array_map('strtoupper', $method) : [strtoupper($method)];
        $this->routes[] = [
            'path' => $path,
            'callback' => $callback,
            'middleware' => [],
            'method' => $method,
            'needToken' => true,
        ];
        return $this;
    }

    public function get($path, $callback): self
    {
        return $this->add($path, $callback, 'GET');
    }

    public function post($path, $callback): self
    {
        return $this->add($path, $callback, 'POST');
    }
    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function despatch(): mixed {
        $path = $this->request->getPath();
        $route = $this->matchRoute($path);
        if (false === $route) {
            $this->response->setResponseCode(404);
            echo '404 Not Found';
            return '';
        }
        if (is_array($route['callback'])) {
            $route['callback'][0] = new $route['callback'][0];
        }
        return call_user_func($route['callback']);
    }

    protected function matchRoute($path): array|false
    {
        foreach ($this->routes as $route) {
            if (
                preg_match("#^{$route['path']}$#", "/{$path}",  $matches) &&
                in_array($this->request->getMethod(), $route['method'])
            ) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $this->route_params[$key] = $match;
                    }
                }
                return $route;
            }
        }
        return false;
    }
}