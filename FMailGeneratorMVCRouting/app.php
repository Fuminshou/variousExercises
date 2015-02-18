<?php

require_once 'Router.php';
require_once 'FrontController.php';

$router = new Router();
$frontC = new FrontController();

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;

require_once $frontC->output($router->match($uri));