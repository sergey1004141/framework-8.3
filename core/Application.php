<?php

namespace Framework;

use Buggregator\Trap\Handler\Router\Attribute\Route;

class Application
{
    protected string $uri;
    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->request = new Request(urldecode($this->uri));
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
    }

    public function run(): void
    {
        echo $this->router->despatch();
    }
}

