<?php

namespace Controller\SignIn;

use Controller\Controller;
use Model\User;
use Request\SignIn\AuthRequest;
use View\View;

class AuthController implements Controller
{

    public function handle(): void
    {
        $request = AuthRequest::init();

        $user = User::findByEmail($request['payload']['email']);

        if (!password_verify($request['payload']['password'], $user['password'])){
            View::render('user/sign_in', ['authSuccess' => false]);
        }else{

            $auth = User::auth($user['email']);

            if (!$auth){
                View::render('user/sign_in', ['authSuccess' => false]);
            }else{
                loginUser($user['id'], $user['email']);
                View::render('user/dashboard', ['user' => $user]);
            }
        }
    }
}