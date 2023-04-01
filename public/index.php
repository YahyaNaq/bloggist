<?php
session_start();

use Core\Router;

const BASE_PATH = __DIR__ . "\..\\";

require BASE_PATH . 'Core\functions.php';

spl_autoload_register( function ($class) {
    require base_path("$class.php");
});

$router = new Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// dd($base_uri);

$method= $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri,$method);