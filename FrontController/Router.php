<?php

class Route {

    public $model;
    public $view;
    public $controller;

    public function __construct($model, $view, $controller) {
        $this->model = $model;
        $this->view = $view;
        $this->controller = $controller;
    }

}

class Router {

    private $table = array();

    public function __construct() {
        $this->table['controller'] = new Route('Model', 'View', 'Controller');
    }

    public function getRoute($route) {
        $route = strtolower($route);

        //Return a default route if no route is found
        if (!isset($this->table[$route])) {
            return $this->table['controller'];
        }

        return $this->table[$route];
    }

}
