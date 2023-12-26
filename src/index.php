<?php

require __DIR__ . '/Lib/Dev.php';
require 'autoloader.php' ;

$router = new Core\Router;
$router->run();