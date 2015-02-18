<?php

require_once 'Router.php';
require_once 'FrontController.php';

$frontController = new FrontController(new Router, $_GET['route'], isset($_GET['action']) ? $_GET['action'] : null);

echo $frontController->output();