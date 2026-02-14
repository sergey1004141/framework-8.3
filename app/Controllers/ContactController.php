<?php

namespace App\Controllers;

class ContactController
{
    public function index(): string
    {
        return app()->view->render('contact/index', ['name' => 'John Doe', 'age' => 30]);
    }

    public function contact(): string
    {
        return 'contact-contact';
    }
}