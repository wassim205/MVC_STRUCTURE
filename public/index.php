<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
use App\Core\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


$router = new Router();
require __DIR__ . '/../config/routes.php';
$router->dispatch();