<?php

require_once __DIR__ . '/env.php';

$config = require __DIR__ . '/../config/database.php';

try {
    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        $config['host'],
        $config['database'],
        $config['charset']
    );

    $PDO = new PDO($dsn, $config['user'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    global $PDO;

} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage() . "\n");
}