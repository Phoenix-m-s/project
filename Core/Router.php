<?php
// Core/Router.php
namespace Core;

class Router {
    private $routes = [];

    public function register($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function route($route) {
        if (array_key_exists($route, $this->routes)) {
            return $this->routes[$route]();
        } else {
            echo '404 - Page not found';
        }
    }
}