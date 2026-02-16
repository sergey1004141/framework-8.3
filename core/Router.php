<?php

namespace Framework;

use App\Controllers\BaseController;
use Framework\Router\Route;

class Router
{
    private array $routes = [];
    protected $route_params = [];

    public function __construct(
        protected Request  $request,
        protected Response $response
    )
    {
        $this->parseRoutes();
    }

    private function parseRoutes()
    {
        foreach (glob(APP . '/Controllers/*' . 'php') as $controller) {
            $controller = 'App\\Controllers\\' . basename($controller, '.php');
            $reflectionClass = new \ReflectionClass($controller);
            $methods = $reflectionClass->getMethods();
            foreach ($methods as $method) {
                $attributes = $method->getAttributes();
                foreach ($attributes as $attribute) {
                    if (preg_match('/^Framework\\\Router\\\(Route|Get|Post|Put|Delete)$/', $attribute->getName())) {
                        $instance = $attribute->newInstance();
                        $path = '/' . trim($instance->path, '/');
                        $action = $method->getName();
                        $method = is_array($instance->method) ? array_map('strtoupper', $instance->method) : [strtoupper($instance->method)];
//                    $middleware = $method->getName();
//                    $middleware = is_array($method) ? array_map('strtoupper', $method) : [strtoupper($method)];
                        $this->routes[] = [
                            'path' => $path,
                            'controller' => $controller,
//                        'middleware' => $middleware,
                            'action' => $action,
                            'method' => $method,
                            'needToken' => true,
                        ];
                    }
                }
            }
        }
        return $this;
    }

    public function despatch(): mixed {
        $path = $this->request->getPath();
        $route = $this->matchRoute($path);

        if (false === $route) {
            $this->response->setResponseCode(404);
            echo '404 Not Found';
            return '';
        }

        return call_user_func([new $route['controller'], $route['action']]);
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