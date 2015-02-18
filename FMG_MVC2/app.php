<?php

require_once 'IndexModel.php';
require_once 'ArchiveModel.php';
require_once 'Controller.php';

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;

$route = ["/app.php" => 'sendForm',
           "/app.php/archive" => "showOldMail"];

if($uri == "/app.php"){
    sendForm();
}
elseif ($uri == "/app.php/archive") {
    showOldMail();
}