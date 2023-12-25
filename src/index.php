<?php

require('autoloader.php');

use Core\Router;

$router = new Router();

$router->addRoute('GET', '/', 'MainController@index');

$router->handleRequest();