<?php

namespace Controller\SignUp;

use Controller\Controller;
use Model\User;
use Request\SignUp\CreateUserRequest;
use View\View;

class CreateUserController implements Controller
{
    public function handle(): void
    {
        $request = CreateUserRequest::init();

        if (!empty($request['errors'])) {
            View::render('user/sign_up', $request);
        } else {

            $user = User::create($request['payload']);

            is_null($user)
                ? View::render('user/home', ['register' => false])
                : View::render('user/home', ['register' => true]);
        }
    }
}