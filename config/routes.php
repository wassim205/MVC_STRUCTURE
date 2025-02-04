<?php
$router->add('GET', '/', 'Front\HomeController@index');
$router->add('GET', '/login', 'Front\AuthController@login');
$router->add('GET', '/signup', 'Front\AuthController@signup');
$router->add('GET', '/create', 'Front\AuthController@signup');