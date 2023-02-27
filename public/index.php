<?php

use App\Http\JsonResponse;
use App\Http\Request;
use App\Http\Server;
use App\Routing\Router;
use App\Routing\Route;

require_once __DIR__ . '/../helpers.php';

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router(
    require_once routes_path('api.php')
);

if ($_SERVER['REQUEST_URI'] === '/') {
    die("Hello :)");
}

$callable = fn (Route $current) => $current->route === Server::pathInfo() && $current->method === Server::method();

$action = array_values(array_filter($router->routes(), $callable));

$request = Request::create()
    ->setMethod(Server::method())
    ->set($_GET)
    ->set($_POST);

try {
    $payload = call_user_func(array($action[0]->controller, $action[0]->function), $request);
} catch (Throwable $e) {
    JsonResponse::create([
        'error' => $e->getMessage()
    ], 422);
} finally {
    JsonResponse::create($payload);
}
