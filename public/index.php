<?php

header('Accept: application/json');
header('Content-Type: application/json');

const BASE_PATH = __DIR__.'/../';

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'Core/functions.php';
require BASE_PATH . 'bootstrap.php';

$router = new \Core\Router();
require BASE_PATH . 'routes.php';

$uri = str_replace('/blog_api/public', '', parse_url($_SERVER['REQUEST_URI'])['path']);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (Exception $e) {
    echo json_encode([
        'status' => $e->getCode(),
        'message' => $e->getMessage()
    ]);
    exit();
}


