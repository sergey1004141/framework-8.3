<?php

namespace App\Models;

use Framework\Model;

class User extends Model
{
    protected array $fillable = ['name', 'email', 'password', 'confirmPassword'];

    protected array $rules = [
        'required' => ['name', 'email', 'password', 'confirmPassword'],
        'email' => ['email'],
        'lengthMin' => [
            ['password', 6],
        ],
        'equals' => [
            ['password', 'confirmPassword']
        ],
    ];

    protected array $labels = [
        'name' => 'Имя пользователя',
        'email' => 'Email',
        'password' => 'Пароль',
        'confirmPassword' => 'Подтверждение пароля',
    ];
}