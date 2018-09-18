<?php

require('Autoload.php');

autoload::load();

require('controller/Router.php');

$router = new Router();
$router->routerRequest();