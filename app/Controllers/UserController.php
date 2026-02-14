<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\Router\Get;

class UserController extends BaseController
{
    #[Get(path: '/register')]
    public function register()
    {

    }

    #[Get(path: '/login')]
    public function login()
    {

    }
}