<?php

namespace Route;

use Controller\LogOut\LogOutController;
use Controller\SignIn\AuthController;
use Controller\SignIn\SignInController;
use Controller\Dashboard\DashboardController;
use Controller\Controller;
use Controller\Home\HomeController;
use Controller\SignUp\CreateUserController;
use Controller\SignUp\SignUpController;

class Route
{
    public const HOME_CONTROLLER =  HomeController::class;

    public const URL_BINDING = [
        '/' => HomeController::class,
        '/sign-up' => SignUpController::class,
        '/create-user' => CreateUserController::class,
        '/sign-in' => SignInController::class,
        '/auth' => AuthController::class,
        '/dashboard' => DashboardController::class,
        '/logout' => LogOutController::class,
    ];

    public static function bind(string $url): void
    {
        self::use(new (self::URL_BINDING[$url] ?? self::HOME_CONTROLLER));
    }

    protected static function use(Controller $controller): void
    {
        $controller->handle();
    }

}