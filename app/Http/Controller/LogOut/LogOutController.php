<?php

namespace Controller\LogOut;

use Controller\Controller;
use Model\User;
use View\View;

class LogOutController implements Controller
{
    public function handle(): void
    {
        if (isAuthenticated()){
            $email = currentUser()['email'];
            User::logout($email);
            logoutUser();
        }

        View::render('user/home');
    }
}