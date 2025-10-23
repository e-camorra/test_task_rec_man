<?php

use Model\User;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isAuthenticated(): bool
{
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['email'])){
        return false;
    }

    if (!User::isTokenValid($_SESSION['email'])) {
        User::logout($_SESSION['email']);
        logoutUser();

        return false;
    }

    return true;
}

function loginUser(int $userId, string $email): void
{
    $_SESSION['user_id'] = $userId;
    $_SESSION['email'] = $email;

    session_regenerate_id(true);
}

function currentUser(): ?array
{
    if (!isAuthenticated()) {
        return null;
    }

    return [
        'id' => $_SESSION['user_id'],
        'email' => $_SESSION['email'],
    ];
}

function logoutUser(): void
{
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();
}
