<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../routes/web.php';

$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

foreach ($routes as $route) {
    if ($request_uri === $route['uri'] && $request_method === $route['method']) {
        $handler = $route['handler'];

        $controller = new $handler[0];
        $action = $handler[1];
        $controller->$action();
        break;
    }
}