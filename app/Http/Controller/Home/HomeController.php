<?php

namespace Controller\Home;

use Controller\Controller;
use Model\User;
use View\View;

class HomeController implements Controller
{
    public function handle(): void
    {
        if (isAuthenticated()){
            $userId = currentUser()['id'];
            View::render('user/dashboard', ['user' => User::findById($userId)]);
        }else{
            View::render('user/home');
        }
    }
}