<?php

namespace Request\SignUp;

use Request\Request;

class CreateUserRequest extends Request
{
    public static function rules(): array
    {
        return [
            'first_name' => ['min:0', 'max:20', 'string'],
            'last_name' => ['min:0', 'max:20', 'string'],
            'email' => ['min:0', 'max:20', 'email'],
            'password' => ['password', 'min:6'],
        ];
    }
}