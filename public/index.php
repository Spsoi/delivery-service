<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../routes/web.php';

$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

// удалить / перед ?
$request_uri = str_replace('/?', '?', $request_uri);

// разделим строку $request_uri по символу "?"
$request_uri_parts = explode('?', $request_uri);

// возьмем первый элемент массива - это и будет наш путь
$request_uri = $request_uri_parts[0];
$request = new \App\Http\Request\Request();

if (count($request_uri_parts) > 1) {
    parse_str($request_uri_parts[1], $query);
    $request->setQuery($query);
}

foreach ($routes as $route) {
    if ($request_uri === $route['uri'] && $request_method === $route['method']) {
        $handler = $route['handler'];

        $controller = new $handler[0]($request);
        $action = $handler[1];
        $controller->$action();
        break;
    }
}
