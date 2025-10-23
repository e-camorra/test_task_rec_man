<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../app.php';

$files = glob(__DIR__ . '/*.php');

foreach ($files as $file) {

    if (stripos($file, 'migrate.php') !== false) continue;

    require $file;
}

echo "All migrations executed successfully!!!.\n";
