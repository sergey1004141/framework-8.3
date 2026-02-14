<?php

namespace App\Controllers;

use Framework\Router\Route;

class HomeController extends BaseController
{
    #[Route(path: '/')]
    public function index(): string
    {
        return app()->view->render('home/index', [
            'title' => 'Главная',
        ]);
    }
}