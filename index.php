<?php


error_reporting(E_ALL);

require('Autoload.php');

autoload::load();


require('controller/Router.php');

$router = new Router();
$router->routerRequest();