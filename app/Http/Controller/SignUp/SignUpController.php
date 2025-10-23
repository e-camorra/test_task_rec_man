<?php

namespace Controller\SignUp;

use Controller\Controller;
use Model\User;
use View\View;

class SignUpController implements Controller
{
    public function handle(): void
    {
        if (isAuthenticated()) {
            $userId = currentUser()['id'];
            View::render('user/dashboard', ['user' => User::findById($userId)]);
        } else {
            View::render('user/sign_up');
        }
    }
}