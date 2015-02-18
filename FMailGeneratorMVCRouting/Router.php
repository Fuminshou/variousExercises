<?php

class Router {

    public $router;

    public function __construct() {
        $this->router = ["/app.php" => "index.php",
            "/app.php/archive" => "archive.php"];
    }

    public function match($uri) {
        return isset($this->router[$uri]) ? $this->router[$uri] : "notfound.php";
    }

}
