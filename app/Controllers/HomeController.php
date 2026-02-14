<?php

namespace App\Controllers;

class HomeController
{
    public function index(): string
    {
        return app()->view->render('home/index', ['name' => 'John Do', 'age' => 20]);
    }

    public function test(): string
    {
        return app()->view->render('home/index', ['name' => 'John Do', 'age' => 20]);
    }
}