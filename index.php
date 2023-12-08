<?php
require_once 'Core/Router.php';
require_once __DIR__ . '/app/Controllers/AuthController.php';

use Core\Router;

$router = new Router();

// رجیستر کردن روت‌ها
$router->register('/register', function () {
    $authController = new \App\Controllers\AuthController();
    $authController->register();
});

$router->register('/login', function () {
    $authController = new \App\Controllers\AuthController();
    $authController->login('moj','sak');
});

// روت کردن درخواست
$path = $_SERVER['REQUEST_URI'];
$router->route($path);