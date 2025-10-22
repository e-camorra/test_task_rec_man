<?php
$dsn = 'mysql:host=db;dbname=app_db;charset=utf8mb4';
$user = 'app_user';
$pass = 'app_pass';

try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "<h2>✅ PHP + Nginx + MySQL работают!</h2>";
} catch (PDOException $e) {
    echo "<h2>❌ Ошибка подключения: " . $e->getMessage() . "</h2>";
}
