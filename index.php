<?php

require('autoload.php');

autoload::load();

require('controller/Router.php');

$router = new Router();
$router->routerRequest();