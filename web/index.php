<?php

use Motork\CarController;

require_once __DIR__.'/../src/bootstrap.php';

$controller = CarController::create();

$urlParts = parse_url($_SERVER['REQUEST_URI']);

/*$uri = trim(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
);

$method = $_SERVER['REQUEST_METHOD'];

$routes = [
    '' => 'getIndex',
    'leads' => 'saveLeads',
    'detail/{car-id}' => 'getDetail'
];*/
try {
    if (preg_match('#^/detail/([^/]+)$#', $urlParts['path'], $matches)) {
        $controller->getDetail($matches[1]);
    } elseif ($urlParts['path'] == '/leads') {
        $controller->saveLeads();
    } else {
        $controller->getIndex();
    }

} catch (Exception $ex) {
    $controller->getIndex();
}

