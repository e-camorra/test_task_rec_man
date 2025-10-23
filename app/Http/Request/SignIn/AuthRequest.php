<?php

namespace Request\SignIn;

use Request\Request;

class AuthRequest extends Request
{
    public static function rules(): array
    {
        return [
            'email' => ['email'],
            'password' => ['password', 'min:6'],
        ];
    }
}