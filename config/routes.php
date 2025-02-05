<?php
$router->add('GET', '/', 'Front\HomeController@index');
$router->add('GET', '/login', 'Front\AuthController@login');
$router->add('POST', '/signup', 'Front\AuthController@signup');
$router->add('GET', '/signup', 'Front\AuthController@signup');
$router->add('POST', '/create', 'Front\AuthController@signup');