<?php
require_once 'Core/Router.php';
require_once __DIR__ . '/app/Controllers/AuthController.php';

use Core\Router;

// index.php

require_once __DIR__ . '/vendor/vendor/autoload.php';

$router = new Router();

if ($_SERVER['REQUEST_URI'] === '/login') {
    $router->loginForm();
} elseif ($_SERVER['REQUEST_URI'] === '/register') {
    $router->registerForm();
} elseif ($_SERVER['REQUEST_URI'] === '/dashboard') {
    $router->dashboard();
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Not Found';
}
