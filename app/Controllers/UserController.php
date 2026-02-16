<?php

namespace App\Controllers;

use App\Models\User;
use Framework\Controller;
use Framework\Router\Get;
use Framework\Router\Route;

class UserController extends BaseController
{
    #[Route(path: '/register', method: 'GET')]
    public function register(): bool|string
    {
        return app()->view->render('user/register', [
            'title' => 'Регистрация',
        ], 'auth');
    }

    #[Route(path: '/register', method: 'POST')]
    public function registerStore(): bool|string
    {
        $model = new User();
        $model->loadData();
        return app()->view->render('user/register', [
            'title' => 'Регистрация',
        ], 'auth');
    }

    #[Route(path: '/login', method: ['POST', 'GET'])]
    public function login(): bool|string
    {
        return app()->view->render('user/login', [
            'title' => 'Авторизация',
        ], 'auth');
    }
}