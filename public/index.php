<?php

use App\Core\Router;
use App\Core\Database;
use App\Core\Session;


try {
    require __DIR__ . '/../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    Database::init();
    Session::start();

    $router = new Router();
    require __DIR__ . '/../config/routes.php';
    $router->dispatch();
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit;
}
