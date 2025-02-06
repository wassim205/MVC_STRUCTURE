<?php

require __DIR__ . '/../vendor/autoload.php';
use App\Core\Router;
use App\Core\Database;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Database::init();

use App\Core\Session;
Session::start();
$router = new Router();
require __DIR__ . '/../config/routes.php';
$router->dispatch();