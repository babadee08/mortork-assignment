<?php
session_start();
use Motork\CarController;

require_once __DIR__.'/../src/bootstrap.php';

$controller = CarController::create();

$urlParts = parse_url($_SERVER['REQUEST_URI']);

if (preg_match('#^/detail/([^/]+)$#', $urlParts['path'], $matches)) {
    $controller->getDetail($matches[1]);
} elseif ($urlParts['path'] == '/leads') {
    $controller->saveLeads();
} else {
    $controller->getIndex();
}
