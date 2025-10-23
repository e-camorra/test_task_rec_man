<?php

use Route\Route;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app.php';

Route::bind($_SERVER['REQUEST_URI']);