<?php

require_once 'router.php';

$router = new Router();

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;

$info = $router->match($uri);

require_once $info;