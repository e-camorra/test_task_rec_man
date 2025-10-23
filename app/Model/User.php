<?php

namespace Model;

use PDO;

class User
{
    public static function create(array $data): ?array
    {
        global $PDO;

        try {

            $creating = $PDO->prepare("
                INSERT INTO users (first_name, last_name, email, password)
                VALUES (:first_name, :last_name, :email, :password)
            ");

            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

            $creating->execute([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => $hashedPassword,
            ]);

            $id = $PDO->lastInsertId();

        } catch (\Throwable $e) {
            return null;
        }

        return static::findById($id);
    }

    public static function findById(int $id): ?array
    {
        global $PDO;

        $finding = $PDO->prepare("SELECT id, first_name, last_name, email, created_at FROM users WHERE id = :id");
        $finding->execute(['id' => $id]);
        $user = $finding->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public static function findByEmail(string $email): ?array
    {
        global $PDO;

        $finding = $PDO->prepare("SELECT id, first_name, last_name, email, password, created_at FROM users WHERE email = :email");
        $finding->execute(['email' => $email]);
        $user = $finding->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public static function auth(string $email): bool
    {
        global $PDO;

        try {
            $token = bin2hex(random_bytes(32));
            $expiresAt = date('Y-m-d H:i:s', time() + 3600);

            $update = $PDO->prepare("
            UPDATE users 
            SET auth_token = :token, auth_token_expires_at = :expires_at 
            WHERE email = :email
            ");

            $update->execute([
                'token' => $token,
                'expires_at' => $expiresAt,
                'email' => $email,
            ]);

        } catch (\Throwable $e) {
            return false;
        }

        return true;
    }

    public static function logout(string $email): bool
    {
        global $PDO;

        try {
            $update = $PDO->prepare("UPDATE users SET auth_token = NULL WHERE email = ?");
            $update->execute([$email]);
        } catch (\Throwable $e) {
            return false;
        }

        return true;
    }

    public static function isTokenValid(string $email): bool
    {
        global $PDO;

        $query = $PDO->prepare("
        SELECT auth_token, auth_token_expires_at 
        FROM users 
        WHERE email = :email
        LIMIT 1
    ");
        $query->execute(['email' => $email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!$user || empty($user['auth_token'])) {
            return false;
        }

        if ($user['auth_token_expires_at'] === null) {
            return false;
        }

        $expiresAt = strtotime($user['auth_token_expires_at']);
        $now = time();

        return $expiresAt > $now;
    }

}